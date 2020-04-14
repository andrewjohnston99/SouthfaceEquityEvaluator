@extends('common.project_header')

@section('page-content')
    <h2>{{ $data['title'] }}</h2>
    <i class="material-icons align-middle">navigate_next</i>
    @if (Route::current()->getName() == 'projects.tables.show')
        <select class="form-control" id="tableSelect">
            @foreach ($data['tables'] as $table)
                <option value="{{ $table->abbrev }}">{{ $table->name }}</option>
            @endforeach
        </select>
    @else
        <h2>Report</h2>
    @endif
@endsection

@section('project-btns')

    @if (Route::current()->getName() == 'projects.tables.show')
        <button class="save" id="saveChanges" form="tableForm" type="submt">
            <span>
                <i class="material-icons align-middle">save</i>
            </span>
            Save
        </button>
        <a class="exit" href="{{ route('projects.show', ['id' => $data['id']]) }}">Exit</a>
    @else
        <a class="edit" href="{{ route('projects.edit', ['id' => $data['id']]) }}">
            <span>
                <i class="material-icons align-middle">edit</i>
            </span>
            Edit
        </a>
        <a class="exit" href="{{ route('home') }}">Exit</a>
    @endif
@endsection
