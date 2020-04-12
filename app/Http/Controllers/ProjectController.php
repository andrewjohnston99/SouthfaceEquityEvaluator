<?php

namespace App\Http\Controllers;

use App\MartaStation;
use Illuminate\Http\Request;
use App\Project;
use App\Question;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Get all optional entries from ProjectItemsOptions for specified resource.
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getOptionalProjectAnswers($id, $tableAbbrev)
    {
        return DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('ProjectItemsOptions as pio', function ($join) {
                $join->on('pio.item_id', '=', 'qt.item_id')
                    ->on('pio.project_id', '=', 'p.id');
            })
            ->where('p.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->where('itm.required', false)
            ->select('p.title as project_title', 'tb.name as table_name', 'tb.abbrev as table_abbrev', 'itm.name as item', 'itm.required as required', 'itm.instructions as item_instructions', 'qt.id as question_id', 'pio.option_id')
            ->orderBy('itm.name', 'asc')
            ->get();
    }

    /**
     * Get all required entries from ProjectItemsOptions for specified resource.
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getRequiredProjectAnswers($id, $tableAbbrev)
    {
        return DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('ProjectItemsOptions as pio', function ($join) {
                $join->on('pio.item_id', '=', 'qt.item_id')
                    ->on('pio.project_id', '=', 'p.id');
            })
            ->where('p.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->where('itm.required', true)
            ->select('p.title as project_title', 'tb.name as table_name', 'tb.abbrev as table_abbrev', 'itm.name as item', 'itm.required as required', 'itm.instructions as item_instructions', 'qt.id as question_id', 'pio.option_id')
            ->orderBy('itm.name', 'asc')
            ->get();
    }

    /**
     * Get all questions for a specified resource.
     *
     * @param int $id
     * @return \App\Question
     */
    public function getProjectQuestions($id)
    {
        return Question::join('Options as o', 'o.question_id', '=', 'Questions.id')
            ->join('Items as itm', 'Questions.item_id', '=', 'itm.id')
            ->join('ProjectTables as tb', 'itm.table_id', '=', 'tb.id')
            ->join('StationsTables as mt', 'mt.table_id', '=', 'tb.id')
            ->join('MartaStations as ms', 'mt.station_id', '=', 'ms.id')
            ->join('Projects as p', 'p.station_id', '=', 'ms.id')
            ->where('p.id', $id)
            ->orderBy('Questions.id')
            ->distinct()
            ->get(['Questions.id', 'Questions.header']);

    }

    /**
     * Get total score for a specified resource.
     *
     * @param int $id
     * @return int
     */
    private function getTotalScore($id)
    {
        return DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('ProjectItemsOptions as pio', function ($join) {
                $join->on('pio.item_id', '=', 'qt.item_id')
                    ->on('pio.project_id', '=', 'p.id');
            })
            ->join('Options as o', 'o.id', '=', 'pio.option_id')
            ->where('p.id', $id)
            ->whereNotNull('pio.option_id')
            ->sum('o.points');
    }

    /**
     * Get table score for a specified resource.
     *
     * @param int     $id
     * @param string  $tableAbbrev
     * @return int
     */
    private function getTableScore($id, $tableAbbrev)
    {
        return DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('ProjectItemsOptions as pio', function ($join) {
                $join->on('pio.item_id', '=', 'qt.item_id')
                    ->on('pio.project_id', '=', 'p.id');
            })
            ->join('Options as o', 'o.id', '=', 'pio.option_id')
            ->where('p.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->whereNotNull('pio.option_id')
            ->sum('o.points');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return response()->json($projects, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;
        $project->user_id = auth()->user()->id;

        $project->title = $request->projectTitle;

        $metadata = array(
            'address' => $request->siteAddress,
            'charrette' => $request->charretteDate,
            'kickoff' => $request->kickoffDate
        );
        $metadata = json_decode(json_encode($metadata));
        $project->project_metadata = $metadata;

        $station = MartaStation::where('name', $request->martaStation)->first();
        $project->station_id = $station->id;
        $project->save();

        $tables = $station->tables;

        $projectData = null;

        $url = 'projects/' . $project->project_id . '/tables/equity';

        return redirect($url)->with('data', ['project' => $projectData, 'title' => $project->title, 'tables' => $tables, 'id' => $project->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $uid = auth()->user()->id;

        $title = Project::where('user_id', $uid)->where('id', $id)->pluck('title')->first();

        $projectScores = [
            'total' => $this->getTotalScore($id),
        ];

        return view('project_report')->with('data', ['scores' => $projectScores, 'title' => $title, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $defaultTable = 'equity';

        $url = 'projects/' . $id . '/tables/' . $defaultTable;

        return redirect($url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $uid = auth()->user()->id;

        $project = Project::where('user_id', $uid)
            ->where('project_id', $id)
            ->pluck('project_json');
        $projectData = $project[0];

        $data = $request->data[$request->table];

        $projectData[$request->table] = $data;

        $projectData = json_encode($projectData);

        Project::where('project_id', $id)
            ->update(['project_json' => $projectData]);

        return response()->json(["result" => "success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    /**
     * TODO: DELETE THIS FUNCTION. DEV ONLY
     */
    public function token()
    {
        return csrf_token();
    }
}
