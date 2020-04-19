@extends('common.default')

@section('title', 'Home')

@section('content')

    @include('common.header')

    <div class="landing container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h1 class="accent">Equity Evaluator</h1>
                </div>
                <div class="row text-center mb-5">
                    <h1>Everything you need to build better communities for tommorow</h1>
                </div>
                <div class="row">
                    <button id="getStartedBtn" class="gs-btn" type="button" onclick="window.location='{{ route('register') }}'">Get Started</button>
                </div>
                <div class="row mt-5">
                    <a href="{{ route('guest') }}" class="guest">Click here to try the tool without creating an account.</a>
                </div>
            </div>
        </div>

    </div>

@endsection
