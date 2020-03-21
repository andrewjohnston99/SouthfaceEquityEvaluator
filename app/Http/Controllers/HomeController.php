<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjectController $project)
    {
        $this->middleware('auth');
        $this->project = $project;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = $this->project->index();
        $projects = json_decode($response->getContent(), true);

        $projectData = array();

        foreach ($projects as $project) {
            $projectData[$project['project_id']] = $project['project_metadata'];
        }

        return view('home')->with('projects', $projectData);
    }
}
