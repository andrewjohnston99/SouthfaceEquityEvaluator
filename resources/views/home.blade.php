@extends('common.default')

@section('title', 'Home')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('js')
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/project.js') }}"></script>
<script>
    document.getElementById("charretteDate").flatpickr({});
    document.getElementById("kickoffDate").flatpickr({});
</script>
@endsection

@section('content')
    @include('home_header_content')

    <div class="home">
        <div class="hero d-flex">
            <h2>These are all your projects.</h2>
            <button class="add-btn" data-toggle="modal" data-target="#createProjectModal" type="button">
                <span>
                    <i class="material-icons align-middle">add</i>
                </span>
                New Project
            </button>
        </div>
    </div>

    <div class="projects d-flex">
        @isset($projects)
            <form action="/" method="get" id="getProjectForm">
                <div class="project-btn-wrapper h-100 d-flex flex-row justify-content-between">
                    @foreach ($projects as $project)
                        @include('button')
                    @endforeach
                </div>
            </form>
        @endisset
        @empty($projects)
            <h3 class="no-projects align-self-center">No saved projects!</h3>
        @endempty
    </div>

    @include('create_project')
@endsection
