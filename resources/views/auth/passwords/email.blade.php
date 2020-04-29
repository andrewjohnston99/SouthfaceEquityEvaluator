@extends('common.default')

@section('title', 'Forgot Password')

@section('content')
    @include('common.header')
    <div class="reset container d-flex align-items-center">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h2 class="login-header">Reset your password.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="submit-btn">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
