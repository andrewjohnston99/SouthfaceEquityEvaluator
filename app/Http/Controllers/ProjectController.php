<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = auth()->user()->id;

        $projects = Project::where('user_id', $uid)->get();

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
        $metadata = array(
            'title' => $request->projectTitle,
            'address' => $request->siteAddress,
            'charrette' => $request->charretteDate,
            'kickoff' => $request->kickoffDate,
            'marta' => $request->martaStation
        );

        $metadata = json_decode(json_encode($metadata));

        $new_project = Project::create([
            'user_id' => auth()->user()->id,
            'project_metadata' => $metadata
        ]);

        $project = null;

        $url = 'projects/' . $new_project->project_id;

        return redirect($url)->with('data', ['project' => $project, 'title' => $new_project->metadata['title'], 'id' => $new_project->id]);
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

        $data = Project::select('project_json')
        ->where('user_id', $uid)
        ->where('project_id', $id)
        ->select('project_json','project_metadata')->get();

        return view('project_report')->with('data', ['project' => $data[0]['project_json'], 'title' => $data[0]['project_metadata']['title'], 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uid = auth()->user()->id;

        $data = Project::select('project_json')
            ->where('user_id', $uid)
            ->where('project_id', $id)
            ->select('project_json','project_metadata')->get();

        $url = 'projects/' . $id . '/tables/equity';

        return redirect($url)->with('data', ['project' => $data[0]['project_json'], 'title' => $data[0]['project_metadata']['title'], 'id' => $id]);
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
        $data = json_encode($request->all());

        Project::where('project_id', $id)
            ->update(['project_json' => $data]);

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
