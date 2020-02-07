@extends('common.default')

@section('title', 'Project')

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
@endsection