<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

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
     * Show the project page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('project');
    }

    /**
     * Create new project instance
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) {
        /*TODO: create project*/
    }
}
