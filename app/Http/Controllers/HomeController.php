<?php

namespace App\Http\Controllers;

use App\MartaStation;
use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;
use App\Mail\Help;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * The project controller instance.
     */
    protected $projectController;

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

    /**
     * Send help form data
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function help(Request $request) {
        $data = [
            'user' => Auth::user()->name,
            'email' => Auth::user()->email,
            'message' => $request->message,
            'organization' => Auth::user()->organization,
        ];

        Mail::to(config('mail.from.address'))->send(new Help($data));

        $request->session()->flash('alert-success', 'Your help request has been submitted!');
        return redirect()->back();
    }
}
