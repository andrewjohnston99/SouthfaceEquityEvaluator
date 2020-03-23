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

@section('content')

    @include('common.project-header')

    @include('tables.gen-equity')

    @include('tables.services')

    @include('tables.population')

    @include('tables.community')

    @include('tables.housing')

    @include('tables.physical')

@endsection


