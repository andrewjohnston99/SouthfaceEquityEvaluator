@extends('common.default')

@section('title', 'Edit Project')

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
    <script src="{{ URL::asset('js/project.js') }}"></script>
@endsection

@section('content')

    @include('common.project_header_content')

    @if (Request::segment(4) !== 'contact')
        <div class="row info">
            <i class="material-icons align-middle">info</i>
        <p>Click on any of the items in the sidebar to get more information. Click <a href="{{ Storage::url('Southface Equity Evaluator Instructions.pdf') }}" target="_blank">here</a> to view the complete documentation.</p>
        </div>
    @endif

    <div class="row project-content">
        @if (Request::segment(4) !== 'contact')
            <div class="col-2 sidebar">
                @include('common.project_sidebar')
            </div>
        @endif

        <div class="{{ Request::segment(4) == 'contact' ? 'col' : 'col-10' }}">
            @if (isset($data['tableInfo']))
                @include('tables.table')
            @else
                @include('tables.contact')
            @endif
        </div>
    </div>
@endsection


