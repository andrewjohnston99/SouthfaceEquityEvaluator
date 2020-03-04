<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Project;


class ProjectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Project Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the creation, modification, and deletion of projects.
    |
    */

    /**
     * Show the project page for project with specified {id}
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $id = $request->query('id');
        $project = Project::where('project_id', $id)->get();

        // return view('project');
        return response()->json($project, 200);
    }

    /**
     * Get all projects for user
     *
     *
     * @return Response
     */
    public function getProjects(Request $request)
    {
        $uid = auth()->user()->id;

        $projects = Project::where('user_id', $uid)->get();

        return response()->json($projects, 200);
    }

    /**
     * Create new project instance
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $result = $request->project_metadata;
        Project::create([
            'user_id' => auth()->user()->id,
            'project_metadata' => $result
        ]);

        return response()->json($result, 200);
    }


    /**
     * Save project
     *
     * @param Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        $id = $request->query('id');
        $data = json_encode($request->all());

        Project::where('project_id', $id)
            ->update(['project_json' => $data]);

        return response()->json(["result" => "success"], 200);
    }


    public function token()
    {
        return csrf_token();
    }
}
