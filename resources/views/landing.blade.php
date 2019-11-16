@extends('common.default')

@section('title', 'Home')

@section('content')

    @include('common.header')

    <div class="landing container d-flex align-items-center">
        <div class="row">
            <h1 class="accent">Equity Evaluator</h1>
        </div>
        <div class="row text-center mb-5">
            <h1>Everything you need to build better communities for tommorow</h1>
        </div>
        <div class="row">
            <button id="getStartedBtn" class="gs-btn" type="button" onclick="window.location='{{ route('login') }}'">Get Started</button>
        </div>
    </div>

@endsection
