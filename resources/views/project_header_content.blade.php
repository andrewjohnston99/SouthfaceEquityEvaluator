@extends('common.project_header')

@section('page-content')
    <h2>{{ $data['title'] }}</h2>
    <i class="material-icons align-middle">navigate_next</i>
    @if (Route::current()->getName() == 'projects.edit')
        <select class="form-control" id="tableSelect">
            <option value="equity">General Equity</option>
            <option value="physical">Physical Form</option>
            <option value="services">Services</option>
            <option value="population">Population/Preservation</option>
            <option value="community">Balanced Community</option>
            <option value="housing">Housing Diversity</option>
            <option value="contact">Edit Contacts</option>
        </select>
    @else
        <h2>Report</h2>
    @endif
@endsection

@section('project-btns')

    @if (Route::current()->getName() == 'projects.edit')
        <button class="save" id="saveChanges">
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
