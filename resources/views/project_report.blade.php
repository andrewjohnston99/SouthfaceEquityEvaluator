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
        <div class="scores d-flex justify-content-center">
            <form method="post" action="{{url('upload')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <label for="document">Upload Confirmation Documents</label>
                <input type="file" class="form-control" name="document">
                <button type="submit" class="btn btn-success">Upload</button>
            </form>
        </div>
    </div>
@endsection
