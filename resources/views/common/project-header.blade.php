<div class="project-header container-fluid d-flex">
    @if (Route::current()->getName() == 'home')
        <a href="{{ route('home') }}">
            <img src="{{ URL::asset('images/southface-logo-sm.png') }}" />
        </a>
    @else
        <a href="{{ route('home') }}">
            <img src="{{ URL::asset('images/southface-icon.pnp') }}" />
        </a>
    @endif

    @yield('page-content')

    @yield('project-btns')
</div>
