@extends('common.default')

@section('title', 'Login')

@section('content')

    @include('common.header')

    <div class="login container d-flex align-items-center">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h2 class="login-header">Login to your Southface account.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        {{-- <label for="email">Email Address</label> --}}
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="password">Password</label> --}}
                        <input id="password" class="form-control login-password @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    </div>
                    <button type="submit" class="submit-btn">Login</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
