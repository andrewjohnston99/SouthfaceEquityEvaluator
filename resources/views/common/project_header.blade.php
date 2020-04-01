<div class="project-header container-fluid d-flex">
    <div class="info-container d-flex flex-row align-items-center">
        @if (Route::current()->getName() == 'home')
            <a href="{{ route('home') }}">
                <img src="{{ URL::asset('images/southface-logo-sm.png') }}" />
            </a>
        @else
            <a href="{{ route('home') }}">
                <img class="southface-icon" src="{{ URL::asset('images/southface-icon.png') }}" />
            </a>
        @endif
        @yield('page-content')
    </div>
    <div class="btn-container">
        @yield('project-btns')
    </div>
</div>
