<?php

namespace App\Http\Controllers;

use App\Contact;
use App\MartaStation;
use App\Note;
use App\Option;
use App\Project;
use App\ProjectTable;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class ProjectTableController extends Controller
{
    /**
     * The project controller instance.
     */
    protected $projectController;

    /**
     * Create a new controller instance.
     *
     * @param  ProjectController  $projectController
     * @return void
     */
    public function __construct(ProjectController $projectController)
    {
        $this->middleware('auth');
        $this->projectController = $projectController;
    }

     /**
     * Show the specified project table.
     *
     * @param  int     $projectId
     * @param  string  $table
     * @return Response
     */
    public function show($projectId, $table)
    {
        $projectInfo = Project::select('title', 'station_id')->where('id', $projectId)->first();

        if (!isset($projectInfo)) {
            abort(404);
        }

        $station = MartaStation::where('id', $projectInfo['station_id'])->first();
        $tables = $station->tables;

        $contactInfo = Contact::where('project_id', $projectId)->first();

        if ($table == 'contact') {
            return view('tables.table_template')->with('data', ['tables' => $tables, 'title' => $projectInfo['title'], 'contactInfo' => $contactInfo, 'id' => $projectId]);
        }

        $answers = $this->projectController->getProjectAnswers($projectId, $table);
        if ($answers->isEmpty()) {
            $answers = null;
        }

        $optionalQuestionData = $this->projectController->getOptionalProjectQuestions($projectId, $table);
        $optionalQuestions = [];

        if (!$optionalQuestionData->isEmpty()) {
            foreach($optionalQuestionData as $q) {
                array_push($optionalQuestions, Question::where('id', $q->question_id)->first());
            }
        } else {
            $optionalQuestions = null;
        }

        $requiredQuestionData = $this->projectController->getRequiredProjectQuestions($projectId, $table);
        $requiredQuestions = [];

        if (!$requiredQuestionData->isEmpty()) {
            foreach($requiredQuestionData as $q) {
                array_push($requiredQuestions, Question::where('id', $q->question_id)->first());
            }
        } else {
            $requiredQuestions = null;
        }

        $tableInfo = DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->where('tb.abbrev', $table)
            ->select('tb.*')
            ->first();

        $tableScore = $this->projectController->getTableScore($projectId, $table);

        return view('tables.table_template')->with('data', ['answers' => $answers, 'optionalQuestions' => $optionalQuestions, 'requiredQuestions' => $requiredQuestions, 'tableInfo' => $tableInfo, 'tables' => $tables, 'title' => $projectInfo['title'], 'tableScore' => $tableScore, 'id' => $projectId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectId
     * @param  string $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projectId, $table)
    {
        if ($table == 'contact') {
            return $this->contact($request, $projectId);
        }

        $percentChanges = [];
        $optionIds = [];
        $notes = [];

        foreach ($request->except(['_method', '_token']) as $id => $input) {
            if (!is_null($input)) {
                if (preg_match('/\boption\b/', $id)) {
                    array_push($optionIds, preg_replace('/[^0-9]/', '', $id));
                } else if (preg_match('/\bselect\b/', $id) && $input != "Select an item") {
                    array_push($optionIds, preg_replace('/[^0-9]/', '', $id));
                } else if (explode("-", $id)[0] == 'percent') {
                    array_push($optionIds, preg_replace('/[^0-9]/', '', $id));
                    Option::where('id', preg_replace('/[^0-9]/', '', $id))->update(['percentage' => $input]);
                    array_push($percentChanges, $id);
                } else if (preg_match('/\bnote\b/', $id)) {
                    $notes[preg_replace('/[^0-9]/', '', $id)] = $input;
                }
            }
        }

        foreach ($percentChanges as $id) {
            Option::where('id', preg_replace('/[^0-9]/', '', $id))->update(['points' => $request['val-' . $id]]);
        }

        DB::transaction(function() use ($optionIds, $notes, $projectId, $table) {
            $tableId = ProjectTable::where('abbrev', $table)->pluck('id')->first();

            DB::table('ProjectTableItemsOptions')->where('project_id', $projectId)->where('table_id', $tableId)->delete();

            foreach ($notes as $id => $note) {
                Note::where('id', $id)->update(['text' => $note]);
            }

            foreach ($optionIds as $id) {
                $option = Option::where('id', $id)->first();
                $item_id = $option->question->item->id;
                DB::table('ProjectTableItemsOptions')->insert([
                    'project_id' => $projectId,
                    'item_id' => $item_id,
                    'option_id' => $id,
                    'table_id' => $tableId
                ]);
            }
        });

        $url = 'projects/' . $projectId . '/tables/' . $table;
        $request->session()->flash('alert-success', 'Changes saved!');

        return redirect($url);
    }

    /**
     * Update the contact and info for the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectId
     * @param  string $table
     * @return \Illuminate\Http\Response
     */
    public function contact(Request $request, $projectId) {
        $data = $request->except(['_method', '_token']);
        $data = array_filter($data);
        $update = [];

        foreach ($data as $id => $val) {
            $update[strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $id))] = $val;
        }

        Contact::updateOrCreate(
            ['project_id' => $projectId],
            $update
        );

        $url = 'projects/' . $projectId . '/tables/contact';
        $request->session()->flash('alert-success', 'Changes saved!');

        return redirect($url);
    }
}
