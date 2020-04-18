@extends('common.default')

@section('title', 'Home')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('js')
    <script src="{{ URL::asset('js/project.js') }}"></script>
    <script>
        document.getElementById("charretteDate").flatpickr({
            dateFormat: "m-d-Y"
        });
        document.getElementById("kickoffDate").flatpickr({
            dateFormat: "m-d-Y"
        });
    </script>
@endsection

@section('content')
    @include('common.home_header_content')
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
    <div class="projects">
        @isset($data['projects'])
            @foreach ($data['projects'] as $project)
                @include('project_card')
            @endforeach
        @endisset
        @empty($data['projects'])
            <h3 class="no-projects align-self-center">No saved projects!</h3>
        @endempty
    </div>
    <div class="help row justify-content-end">
        <i class="material-icons btn" id="helpButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">help_outline</i>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <h4 class="text-center font-weight-bold">Need help?</h4>
            <div class="dropdown-divider"></div>
            <form class="px-4 py-3 pb-3" action="{{ route('help') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="10" placeholder="Let us know how we can help you out here."></textarea>
                </div>
                <button class="float-right btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
    @include('create_project')
@endsection
