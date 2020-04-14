<?php

namespace App\Http\Controllers;

use App\MartaStation;
use App\Note;
use App\Option;
use App\Project;
use App\ProjectTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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
        $optionalItems = $this->projectController->getOptionalProjectAnswers($projectId, $table);
        if (!count($optionalItems)) {
            $optionalItems = null;
        }

        $requiredItems = $this->projectController->getRequiredProjectAnswers($projectId, $table);
        if (!count($requiredItems)) {
            $requiredItems = null;
        }

        $questions = $this->projectController->getProjectQuestions($projectId);

        $tableInfo = DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->where('tb.abbrev', $table)
            ->select('tb.*')
            ->first();

        $tableScore = $this->projectController->getTableScore($projectId, $table);

        $projectInfo = Project::select('title', 'station_id')->where('id', $projectId)->first();
        $station = MartaStation::where('id', $projectInfo['station_id'])->first();
        $tables = $station->tables;

        return view('table_template')->with('data', ['optionalItems' => $optionalItems, 'requiredItems' => $requiredItems, 'questions' => $questions, 'tableInfo' => $tableInfo, 'tables' => $tables, 'title' => $projectInfo['title'], 'tableScore' => $tableScore, 'id' => $projectId]);
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
        $optionIds = [];
        $notes = [];
        foreach ($request->all() as $id => $input) {
            if ($id != '_method' && $id != '_token' && !is_null($input)) {
                if (strpos($id, 'option') !== false) {
                    array_push($optionIds, preg_replace('/[^0-9]/', '', $id));
                } else {
                    $notes[preg_replace('/[^0-9]/', '', $id)] = $input;
                }

            }
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
}
