@extends('common.default')

@section('title', 'Project Report')

@section('content')
    @include('project_header_content')

    <div class="report">
        <div class="hero d-flex">
            <h2>Here's your project overview.</h2>
            <button class="export" id="exportBtn" type="button">
                <span>
                    <i class="material-icons align-middle">cloud_download</i>
                </span>
                Export Report
            </button>
        </div>
        <div class="scores d-flex justify-content-center">
            <h1 class="mt-5">{{ $data['scores']['total'] }} Total Points</h1>
        </div>
    </div>
@endsection
