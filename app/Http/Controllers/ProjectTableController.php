<?php

namespace App\Http\Controllers;

use App\MartaStation;
use App\Project;
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

        $projectInfo = Project::select('title', 'station_id')->where('id', $projectId)->first();
        $station = MartaStation::where('id', $projectInfo['station_id'])->first();
        $tables = $station->tables;

        return view('table_template')->with('data', ['optionalItems' => $optionalItems, 'requiredItems' => $requiredItems, 'questions' => $questions, 'tableInfo' => $tableInfo, 'tables' => $tables, 'title' => $projectInfo['title'], 'id' => $projectId]);
    }
}
