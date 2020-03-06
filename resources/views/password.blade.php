@extends('common.default')

@include('common.setting-header')

@section('title', 'Password')

@section('css')
    <style>
        html, body {
            margin-top: 10;
        }
    </style> 
@endsection

@section('content')

<!-- <div class="password container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <h2 class="password-header">Password</h2>
                    </div>
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('password') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div> -->

@endsection

