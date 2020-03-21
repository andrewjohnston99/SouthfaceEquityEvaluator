<nav class="navbar navbar-expand-lg d-flex justify content center">
    <div class="flex-column">
        <a class="navbar-brand" href="{{ url('/landing') }}">
            <img src="{{ URL::asset('images/southface-logo-sm.png') }}" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div id="main-nav" class="collapse navbar-collapse d-flex justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('about') }}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('pricing') }}">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('contact') }}">Contact</a>
            </li>
        </ul>
    </div>

    @if (Route::current()->getName() == 'login')
        <button id="registerBtn" class="register-btn" type="button" onclick="window.location='{{ route('register') }}'">Register</button>
    @else
        <button id="loginBtn" class="login-btn" type="button" onclick="window.location='{{ route('login') }}'">Login</button>
    @endif

</nav>
