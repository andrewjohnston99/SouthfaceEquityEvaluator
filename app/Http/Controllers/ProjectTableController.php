<?php

namespace App\Http\Controllers;

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

        $data = Project::select('project_json')
            ->where('user_id', $uid)
            ->where('project_id', $projectId)
            ->select('project_json','project_metadata')->get();

        $view = 'table_views.' . $table;

        return view($view)->with('data', ['project' => $data[0]['project_json'], 'title' => $data[0]['project_metadata']['title'], 'id' => $projectId]);
    }
}
