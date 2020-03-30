<div class="project-header container-fluid d-flex">
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

    @yield('project-btns')
</div>
