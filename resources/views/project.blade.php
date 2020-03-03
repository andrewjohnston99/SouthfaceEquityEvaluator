@extends('common.default')

@section('title', 'Project')

@section('token')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <style>
        html, body {
            margin-top: 0;
        }
    </style>
@endsection

@section('js')
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/table_input.js') }}"></script>
@endsection

@section('content')

    @include('common.project-header')

    @include('tables.gen-equity')

    @include('tables.services')

    @include('tables.population')

    @include('tables.community')

    @include('tables.housing')

    @include('tables.physical')

@endsection


