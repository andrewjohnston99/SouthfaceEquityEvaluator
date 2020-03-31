@extends('common.project_header')

@section('page-content')
    <h2>{{ $data['title'] }}</h2>
    <i class="material-icons align-middle">navigate_next</i>
    <select class="form-control">
        <option value="1">General Equity</option>
        <option value="2">Physical Form</option>
    </select>
@endsection

@section('project-btns')
    <button class="save" id="saveChanges">
        <span>
            <i class="material-icons align-middle">save</i>
        </span>
        Save
    </button>
    <a class="exit" href="{{ route('home') }}">Exit</a>
@endsection
