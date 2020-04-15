@extends('common.default')

@section('title', 'Contact Page')

@section('css')
    <style>
        html, body {
            margin-top: 0;
        }

        .accent {
            margin-top: 50px;
            text-align: center;
        }
    </style>
@endsection

@section('content')

    @include('common.header')

    <div className="info" class="about container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col">
                <div class="row">
                    <h1 class="accent"></h1>
                </div>

                <div class="row">
                    <h1 class="accent">Contact Us</h1>
                </div>
                <div class="row text-left mb-5">
                    <h3>Please send questions and inquiries to equityevaluator@southface.org.</h3>
                </div>
        </div>


@endsection
