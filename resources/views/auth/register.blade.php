@extends('common.default')

@section('title', 'Register')

@section('content')

    @include('common.header')

    <div class="register container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <h3 class="mb-4">Register for a Southface account.</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <div class="col-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <h4 class="text-center mb-3">Are you part of an organization?</h4>
                            <div class="col-6">

                                <input id="organization" type="text" class="form-control" name="organization" value="{{ old('organization') }}" placeholder="Organization" autocomplete="organization">
                            </div>
                        </div>

                        <div class="form-group mt-5 mb-0">
                            <div class="col-6">
                                <button type="submit" class="submit-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
