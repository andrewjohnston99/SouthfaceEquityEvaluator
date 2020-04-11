<?php

namespace App\Http\Controllers;

use App\MartaStation;
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
            $projectData[$project['id']] = $project['project_metadata'];
            $projectData[$project['id']]['title'] = $project['title'];
        }

        $stations = MartaStation::all();
        $stationNames = array();

        foreach($stations as $station) {
            array_push($stationNames, $station->name);
        }

        return view('home')->with('data', ['projects' => $projectData, 'stations' => $stationNames]);
    }
}
