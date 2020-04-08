@extends('common.default')

@section('title', 'Edit Project')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <style>
        html, body {
            margin-top: 0;
        }
    </style>
@endsection

@section('js')
    @include('common.project_select_js')
    <script src="{{ URL::asset('js/project.js') }}"></script>
    <script src="{{ URL::asset('js/tables.js') }}"></script>
@endsection

@section('content')

    @include('project_header_content')

    <div class="row info">
        <i class="material-icons align-middle">info</i>
        <p>Click on any of the items in the sidebar to get more information.</p>
    </div>

    <div class="row project-content">
        <div class="col-2 sidebar">
            @include('common.project_sidebar')
        </div>

        <div class="col-10">
            @include('tables.services')
        </div>
    </div>
@endsection


