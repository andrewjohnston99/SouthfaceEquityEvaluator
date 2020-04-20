@extends('common.project_header')

@section('project-btns')
    @auth
        <a class="settings" href="{{ route('account') }}">
            <span>
                <i class="material-icons align-middle">settings</i>
            </span>
            Settings
        </a>
    @endauth
@endsection
