@extends('common.default')

@section('title', 'Reset Password')

@section('content')
    @include('common.header')
    <div class="reset container d-flex align-items-center">
        <div class="row">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h2 class="reset-header">Reset your password.</h2>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="submit-btn">
                            {{ __('Reset Password') }}
                        </button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
@endsection
