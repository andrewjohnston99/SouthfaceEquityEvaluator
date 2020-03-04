<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $request = Request::create('/get-projects', 'GET');
        $projects = json_decode(app()->handle($request)->getContent(), true);

        $projectData = array();

        foreach ($projects as $project) {
            $projectData[$project['project_id']] = $project['project_metadata'];
        }

        return view('home')->with('projects', $projectData);
    }
}
