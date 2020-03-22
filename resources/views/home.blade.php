@extends('common.default')

@section('title', 'Home')

@section('css')
    <style>
        html, body {
            background-color: #FFFFFE;
        }
    </style>
@endsection

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('js')
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/project.js') }}"></script>
@endsection

@section('content')
    <div class="dashboard container">
        <div class="row d-flex justify-content-between align-items-center header">
            <a href="{{ url('/home') }}">
                <img src="{{ URL::asset('images/southface-logo-sm.png') }}" />
            </a>
            <button id="settingsBtn" class="settings-btn d-flex justify-content-center align-items-center" onclick="window.location='{{ route('account') }}'" type="button">
                <span>
                    @include('icons.settings')
                </span>
                Settings
            </button>
        </div>
        <div class="row d-flex hero">
            <div class="col">
                <img src="{{ URL::asset('images/equity.png') }}" />
            </div>
            <div class="col d-flex align-items-center">
                <h1 class="equity">Equity Evaluator</h1>
            </div>
            <div class="col flex-grow-1 d-flex align-items-center justify-content-end">
                <button id="addBtn" class="add-btn d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#createProjectModal" type="button">
                    New Project
                    <span>
                        @include('icons.add')
                    </span>
                </button>
            </div>
        </div>
        <div class="row projects d-flex justify-content-between">
            @isset($projects)
                <form action="/" method="get" id="getProjectForm">
                    @foreach ($projects as $project)
                        @include('project.button')
                    @endforeach
                </form>
            @endisset
            @empty($projects)
                @include('project.no-button')
            @endempty
        </div>
    </div>

    @include('create_project')
@endsection
