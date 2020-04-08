<?php

namespace App\Http\Controllers;

use App\MartaStation;
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
        $project = new Project;
        $project->user_id = auth()->user()->id;

        $metadata = array(
            'title' => $request->projectTitle,
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
        // dd($tables);

        $projectData = null;

        $url = 'projects/' . $project->project_id . '/tables/equity';

        return redirect($url)->with('data', ['project' => $projectData, 'title' => $project->metadata['title'], 'tables' => $tables, 'id' => $project->id]);
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
