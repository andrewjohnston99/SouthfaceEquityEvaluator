@extends('common.project_header')

@section('project-btns')
    @auth
        <a class="settings d-inline" href="{{ route('account') }}">
            <span>
                <i class="material-icons align-middle">settings</i>
            </span>
            Settings
        </a>
        <a class="nav-link logout d-inline pr-0" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    @endauth

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
