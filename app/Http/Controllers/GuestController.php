<?php

namespace App\Http\Controllers;

use App\Guest;
use App\MartaStation;
use App\Note;
use App\Option;
use App\ProjectTable;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
     /**
     * Get all entries from ProjectItemsOptions for specified resource.
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getProjectAnswers($id, $tableAbbrev)
    {
        return DB::table('Guests as g')
            ->join('MartaStations as ms', 'g.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->join('GuestAnswers as ga', function ($join) {
                $join->on('ga.item_id', '=', 'qt.item_id')
                    ->on('ga.guest_id', '=', 'g.id');
            })
            ->where('g.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->select('g.title as project_title', 'tb.name as table_name', 'tb.abbrev as table_abbrev', 'itm.name as item', 'itm.order as order', 'itm.required as required', 'itm.instructions as item_instructions', 'qt.id as question_id', 'ga.option_id')
            ->orderBy('itm.order', 'asc')
            ->get();
    }

    /**
     * Get all optional questions for a specified resource.
     *
     * @param int $id
     * @return \App\Question
     */
    public function getOptionalProjectQuestions($id, $tableAbbrev)
    {
        return DB::table('Questions as qt')
            ->join('Items as itm', 'qt.item_id', '=', 'itm.id')
            ->join('ProjectTables as tb', 'itm.table_id', '=', 'tb.id')
            ->join('StationsTables as mt', 'mt.table_id', '=', 'tb.id')
            ->join('MartaStations as ms', 'mt.station_id', '=', 'ms.id')
            ->join('Guests as g', 'g.station_id', '=', 'ms.id')
            ->where('g.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->where('itm.required', false)
            ->orderBy('itm.order', 'asc')
            ->distinct()
            ->select('qt.id as question_id', 'itm.name as item_name', 'itm.order as order')
            ->get();
    }

    /**
     * Get all required questions for a specified resource.
     *
     * @param int $id
     * @return \App\Question
     */
    public function getRequiredProjectQuestions($id, $tableAbbrev)
    {
        return DB::table('Questions as qt')
            ->join('Items as itm', 'qt.item_id', '=', 'itm.id')
            ->join('ProjectTables as tb', 'itm.table_id', '=', 'tb.id')
            ->join('StationsTables as mt', 'mt.table_id', '=', 'tb.id')
            ->join('MartaStations as ms', 'mt.station_id', '=', 'ms.id')
            ->join('Guests as g', 'g.station_id', '=', 'ms.id')
            ->where('g.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->where('itm.required', true)
            ->orderBy('itm.order', 'asc')
            ->distinct()
            ->select('qt.id as question_id', 'itm.name as item_name', 'itm.order as order')
            ->get();
    }


    /**
     * Get total score for a specified resource.
     *
     * @param int $id
     * @return int
     */
    public function getTotalScore($id)
    {
        return DB::table('Guests as g')
            ->join('MartaStations as ms', 'g.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('GuestAnswers as ga', function ($join) {
                $join->on('ga.item_id', '=', 'qt.item_id')
                    ->on('ga.guest_id', '=', 'g.id');
            })
            ->join('Options as o', 'o.id', '=', 'ga.option_id')
            ->where('g.id', $id)
            ->whereNotNull('ga.option_id')
            ->sum('o.points');
    }

    /**
     * Get table score for a specified resource.
     *
     * @param int     $id
     * @param string  $tableAbbrev
     * @return int
     */
    public function getTableScore($id, $tableAbbrev)
    {
        return DB::table('Guests as g')
            ->join('MartaStations as ms', 'g.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('GuestAnswers as ga', function ($join) {
                $join->on('ga.item_id', '=', 'qt.item_id')
                    ->on('ga.guest_id', '=', 'g.id');
            })
            ->join('Options as o', 'o.id', '=', 'ga.option_id')
            ->where('g.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->whereNotNull('ga.option_id')
            ->sum('o.points');
    }

    /**
     * Show the project view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $stations = MartaStation::all()->pluck('name');

        return view('home')->with('data', ['stations' => $stations]);
    }

    /**
     * Create new guest resource
     *
     */
    public function create(Request $request) {
        $guest = new Guest();

        $guest->title = $request->projectTitle;

        $metadata = array(
            'address' => isset($request->siteAddress) ? $request->siteAddress : "No Address",
            'charrette' => isset($request->charretteDate) ? $request->charretteDate : "No Charrette Date",
            'kickoff' => isset($request->kickoffDate) ? $request->kickoffDate : "No Kickoff Date"
        );
        $metadata = json_decode(json_encode($metadata));
        $guest->project_metadata = $metadata;

        $station = MartaStation::where('name', $request->martaStation)->first();
        $guest->station_id = $station->id;
        $guest->save();

        $url = 'guest/' . $guest->id . '/tables/equity';

        return redirect($url);
    }

    /**
     * Show the specified project table.
     *
     * @param  int     $guestId
     * @param  string  $table
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($guestId, $table)
    {
        $projectInfo = Guest::select('title', 'station_id')->where('id', $guestId)->first();

        if (!isset($projectInfo)) {
            abort(404);
        }

        $station = MartaStation::where('id', $projectInfo['station_id'])->first();
        $tables = $station->tables;

        $answers = $this->getProjectAnswers($guestId, $table);
        if ($answers->isEmpty()) {
            $answers = null;
        }

        $optionalQuestionData = $this->getOptionalProjectQuestions($guestId, $table);
        $optionalQuestions = [];

        if (!$optionalQuestionData->isEmpty()) {
            foreach($optionalQuestionData as $q) {
                array_push($optionalQuestions, Question::where('id', $q->question_id)->first());
            }
        } else {
            $optionalQuestions = null;
        }

        $requiredQuestionData = $this->getRequiredProjectQuestions($guestId, $table);
        $requiredQuestions = [];

        if (!$requiredQuestionData->isEmpty()) {
            foreach($requiredQuestionData as $q) {
                array_push($requiredQuestions, Question::where('id', $q->question_id)->first());
            }
        } else {
            $requiredQuestions = null;
        }

        $tableInfo = DB::table('Guests as g')
            ->join('MartaStations as ms', 'g.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->where('tb.abbrev', $table)
            ->select('tb.*')
            ->first();

        $tableScore = $this->getTableScore($guestId, $table);

        return view('tables.table_template')->with('data', ['answers' => $answers, 'optionalQuestions' => $optionalQuestions, 'requiredQuestions' => $requiredQuestions, 'tableInfo' => $tableInfo, 'tables' => $tables, 'title' => $projectInfo['title'], 'tableScore' => $tableScore, 'id' => $guestId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $guestId
     * @param  string $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guestId, $table)
    {
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

        DB::transaction(function() use ($optionIds, $notes, $guestId, $table) {
            $tableId = ProjectTable::where('abbrev', $table)->pluck('id')->first();

            DB::table('GuestAnswers')->where('guest_id', $guestId)->where('table_id', $tableId)->delete();

            foreach ($notes as $id => $note) {
                Note::where('id', $id)->update(['text' => $note]);
            }

            foreach ($optionIds as $id) {
                $option = Option::where('id', $id)->first();
                $item_id = $option->question->item->id;
                DB::table('GuestAnswers')->insert([
                    'guest_id' => $guestId,
                    'item_id' => $item_id,
                    'option_id' => $id,
                    'table_id' => $tableId
                ]);
            }
        });

        $url = 'guest/' . $guestId . '/tables/' . $table;
        $request->session()->flash('alert-success', 'Changes saved!');

        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return\Illuminate\Routing\route
     */
    public function destroy($id) {
        $guest = Guest::find($id);
        $guest->delete();

        return redirect()->route('register');
    }
}
