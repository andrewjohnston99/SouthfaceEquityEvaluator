<?php

namespace App\Http\Controllers;

use App\Charts\ScoreBreakdown;
use App\Mail\ProjectReport;
use App\Mail\Upload;
use App\MartaStation;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use \Colors\RandomColor;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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
     * Get all entries from ProjectItemsOptions for specified resource.
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getProjectAnswers($id, $tableAbbrev)
    {
        return DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->join('ProjectTableItemsOptions as pio', function ($join) {
                $join->on('pio.item_id', '=', 'qt.item_id')
                    ->on('pio.project_id', '=', 'p.id');
            })
            ->where('p.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->select('p.title as project_title', 'tb.name as table_name', 'tb.abbrev as table_abbrev', 'itm.name as item', 'itm.order as order', 'itm.required as required', 'itm.instructions as item_instructions', 'qt.id as question_id', 'pio.option_id')
            ->orderBy('itm.order', 'asc')
            ->get();
    }

    /**
     * Get all optional questions for a specified resource.
     *
     * @param int $id
     * @return \App\Question
     */
    public function getOptionalProjectQuestions($id, $tableAbbrev)
    {
        return DB::table('Questions as qt')
            ->join('Items as itm', 'qt.item_id', '=', 'itm.id')
            ->join('ProjectTables as tb', 'itm.table_id', '=', 'tb.id')
            ->join('StationsTables as mt', 'mt.table_id', '=', 'tb.id')
            ->join('MartaStations as ms', 'mt.station_id', '=', 'ms.id')
            ->join('Projects as p', 'p.station_id', '=', 'ms.id')
            ->where('p.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->where('itm.required', false)
            ->orderBy('itm.order', 'asc')
            ->distinct()
            ->select('qt.id as question_id', 'itm.name as item_name', 'itm.order as order')
            ->get();
    }

    /**
     * Get all required questions for a specified resource.
     *
     * @param int $id
     * @return \App\Question
     */
    public function getRequiredProjectQuestions($id, $tableAbbrev)
    {
        return DB::table('Questions as qt')
            ->join('Items as itm', 'qt.item_id', '=', 'itm.id')
            ->join('ProjectTables as tb', 'itm.table_id', '=', 'tb.id')
            ->join('StationsTables as mt', 'mt.table_id', '=', 'tb.id')
            ->join('MartaStations as ms', 'mt.station_id', '=', 'ms.id')
            ->join('Projects as p', 'p.station_id', '=', 'ms.id')
            ->where('p.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->where('itm.required', true)
            ->orderBy('itm.order', 'asc')
            ->distinct()
            ->select('qt.id as question_id', 'itm.name as item_name', 'itm.order as order')
            ->get();
    }


    /**
     * Get total score for a specified resource.
     *
     * @param int $id
     * @return int
     */
    private function getTotalScore($id)
    {
        return DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('ProjectTableItemsOptions as pio', function ($join) {
                $join->on('pio.item_id', '=', 'qt.item_id')
                    ->on('pio.project_id', '=', 'p.id');
            })
            ->join('Options as o', 'o.id', '=', 'pio.option_id')
            ->where('p.id', $id)
            ->whereNotNull('pio.option_id')
            ->sum('o.points');
    }

    /**
     * Get table score for a specified resource.
     *
     * @param int     $id
     * @param string  $tableAbbrev
     * @return int
     */
    public function getTableScore($id, $tableAbbrev)
    {
        return DB::table('Projects as p')
            ->join('MartaStations as ms', 'p.station_id', '=', 'ms.id')
            ->join('StationsTables as mt', 'mt.station_id', '=', 'ms.id')
            ->join('ProjectTables as tb', 'mt.table_id', '=', 'tb.id')
            ->join('Items as itm', 'itm.table_id', '=', 'tb.id')
            ->join('Questions as qt', 'qt.item_id', '=', 'itm.id')
            ->leftJoin('ProjectTableItemsOptions as pio', function ($join) {
                $join->on('pio.item_id', '=', 'qt.item_id')
                    ->on('pio.project_id', '=', 'p.id');
            })
            ->join('Options as o', 'o.id', '=', 'pio.option_id')
            ->where('p.id', $id)
            ->where('tb.abbrev', $tableAbbrev)
            ->whereNotNull('pio.option_id')
            ->sum('o.points');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Auth::user()->projects;

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
        $project->user_id = Auth::id();

        $project->title = $request->projectTitle;

        $metadata = array(
            'address' => isset($request->siteAddress) ? $request->siteAddress : "No Address",
            'charrette' => isset($request->charretteDate) ? $request->charretteDate : "No Charrette Date",
            'kickoff' => isset($request->kickoffDate) ? $request->kickoffDate : "No Kickoff Date"
        );
        $metadata = json_decode(json_encode($metadata));
        $project->project_metadata = $metadata;

        $station = MartaStation::where('name', $request->martaStation)->first();
        $project->station_id = $station->id;
        $project->save();

        $url = 'projects/' . $project->id . '/tables/equity';

        return redirect($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $uid = Auth::id();

        $projectInfo = Project::where('user_id', $uid)->where('id', $id)->select('title', 'station_id')->first();

        $station = MartaStation::where('id', $projectInfo['station_id'])->first();

        $tableScores = [];
        $chartLabels = [];
        $chartColors = [];
        $chart = new ScoreBreakdown;

        foreach ($station->tables as $table) {
            array_push($tableScores, $this->getTableScore($id, $table->abbrev));
            array_push($chartLabels, $table->name);
            array_push($chartColors, 'rgba(' . implode(',', RandomColor::one(array('format' => 'rgb', 'luminosity' => 'light'))) . ',.75)');
        }

        $chart->labels($chartLabels);
        $chart->dataset('Score Breakdown', 'bar', $tableScores)->options(['backgroundColor' => $chartColors]);
        $chart->displayLegend(false);

        $total = $this->getTotalScore($id);

        return view('project_report')->with('data', ['total' => $total, 'chart' => $chart, 'title' => $projectInfo['title'], 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $defaultTable = 'equity';

        $url = 'projects/' . $id . '/tables/' . $defaultTable;

        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $project = Project::find($id);
        $title = $project->title;
        $project->delete();

        $request->session()->flash('alert-success', $title . ' has been deleted.');
        return redirect()->back();
    }

    /**
     * Email upload confirmation documents
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function uploadDocument(Request $request)
    {

        // Get the uploaded file with name document
        $document = $request->file('document');

        // Required validation
        $request->validate([
            'document' => 'required'
        ]);

        // Check if uploaded file size was greater than maximum allowed file size
        if ($document->getError() == 1) {
            $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
            $error = 'The document size must be less than ' . $max_size . 'Mb.';
            return redirect()->back()->with('flash_danger', $error);
        }

        $data = [
            'title' => 'Confirmation Document',
            'document' => $document,
            'user' => Auth::user()->name,
            'user_id' => Auth::id(),
            'organization' => Auth::user()->organization,
            'project_name' => $request->projectTitle,
            'project_id' => $request->projectId,
        ];

        // If upload was successful send the email
        $to_email = config('mail.from.address');
        Mail::to($to_email)->send(new Upload($data));
        $request->session()->flash('alert-success', 'Your document has been uploaded.');
        return redirect()->back();
    }

    /**
     * Generate PDF and mail for specified resource.
     */
    public function export(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();

        $station = MartaStation::where('id', $project->station_id)->first();

        $scores['total'] = $this->getTotalScore($id);

        foreach ($station->tables as $table) {
            $scores[$table->abbrev] = $this->getTableScore($id, $table->abbrev);
        }

        date_default_timezone_set('US/Eastern');

        $data = [
            'user' => Auth::user()->name,
            'title' => $project->title,
            'station' => $station->name,
            'tables' => $station->tables,
            'scores' => $scores,
            'date' => date('m-d-Y'),
            'time' => date('h:ia e'),
        ];

        if ($request->has('download')) {
            $filename = $data['title'] . ' Report.pdf';
            $stylesheet = public_path('css/report.css');

            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML((new ProjectReport($data))->render(), \Mpdf\HTMLParserMode::HTML_BODY);
            $mpdf->Output($filename, 'D');
            return;
        } else if ($request->has('emailSelf')) {
            Mail::to(Auth::user()->email)->send(new ProjectReport($data));
            $request->session()->flash('alert-success', 'Your report has been sent.');
            return redirect()->back();
        } else {
            $to = $request->email;
            Mail::to($to)->send(new ProjectReport($data));
            $request->session()->flash('alert-success', 'Your report has been sent.');
            return redirect()->back();
        }
    }
}
