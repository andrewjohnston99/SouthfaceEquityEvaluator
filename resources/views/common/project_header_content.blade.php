@extends('common.project_header')

@section('page-content')
    <h2>{{ $data['title'] }}</h2>
    <i class="material-icons align-middle">navigate_next</i>
    @if (Route::current()->getName() == 'projects.tables.show' || Route::current()->getName() == 'guest.tables.show')
        <select class="form-control" id="tableSelect">
            @foreach ($data['tables'] as $table)
                <option value="{{ $table->abbrev }}">{{ $table->name }}</option>
            @endforeach
            @auth
                <option value="contact">Edit Contacts and Info</option>
            @endauth
        </select>
    @else
        <h2>Report</h2>
    @endif
@endsection

@section('project-btns')

    @if (Route::current()->getName() == 'projects.tables.show' || Route::current()->getName() == 'guest.tables.show')
        <button class="save" id="saveChanges" form="{{ Request::segment(4) == 'contact' ? 'contactForm' : 'tableForm' }}" type="submt">
            <span>
                <i class="material-icons align-middle">save</i>
            </span>
            Save
        </button>
        @auth
            <a class="exit" href="{{ route('projects.show', ['id' => $data['id']]) }}">Exit</a>
        @endauth
        @guest
            <a class="exit" href="{{ route('register') }}">Exit</a>
        @endguest
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
