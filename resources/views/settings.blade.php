@extends('common.default')

@section('css')
    <style>
        html, body {
            margin-top: 0;
        }
    </style>
@endsection

@section('content')
    <div class="settings-frame container-fluid d-flex">
        <div class="row btn">
            <div class="col btn-col">
                <button class="back-btn d-flex justify-content-center" onclick="window.location='{{ url('home') }}'">
                    <span>
                        <i class="material-icons align-middle">keyboard_backspace</i>
                    </span>
                    Back to Dashboard
                </button>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-2 nav-col">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" id="account" href="{{ url('settings/account') }}" >Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="security" href="{{ url('settings/security') }}">Security</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-10 content">
                @if (Route::currentRouteName() == "account")
                    @include('account')
                @else
                    @include('security')
                @endif
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section('js')
    <script type="text/javascript">
        $(function() {
            setNavigation();
        });

        function setNavigation(){
            var path = window.location.pathname;

            $(".nav a").each(function () {
                if (path === this.pathname) {
                    $(this).addClass('active');
                }
            });
        }
    </script>
@endsection




