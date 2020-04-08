<?php

namespace App\Http\Controllers;

use App\MartaStation;
use Illuminate\Http\Request;
use App\Project;


class ProjectTableController extends Controller
{
     /**
     * Show the specified project table.
     *
     * @param  int     $projectId
     * @param  string  $table
     * @return Response
     */
    public function show($projectId, $table)
    {
        $uid = auth()->user()->id;

        $project = Project::where('user_id', $uid)
            ->where('project_id', $projectId)
            ->select('project_json','project_metadata', 'station_id')->get();

        $station = MartaStation::where('id', $project[0]['station_id'])->first();
        $tables = $station->tables;

        $view = 'table_views.' . $table;

        return view($view)->with('data', ['project' => $project[0]['project_json'], 'title' => $project[0]['project_metadata']['title'], 'tables' => $tables, 'id' => $projectId]);
    }
}
