@extends('common.default')

@section('title', 'Home')

@section('css')
    <style>
        html, body {
            background-color: #FFFFFE;
        }
    </style>
@endsection

@section('content')
    <div class="dashboard container">
        <div class="row d-flex justify-content-between align-items-center header">
            <a href="{{ url('landing') }}">
                <img src="{{ URL::asset('images/southface-logo-sm.png') }}" />
            </a>
            <button id="settingsBtn" class="settings-btn d-flex justify-content-center align-items-center" type="button">
                <span>
                    @include('icons.settings')
                </span>
                Settings
            </button>
        </div>
        <div class="row d-flex hero">
            <div class="col">
                <img src="{{ URL::asset('images/equity.png') }}" />
            </div>
            <div class="col d-flex align-items-center">
                <h1 class="equity">Equity Evaluator</h1>
            </div>
            <div class="col flex-grow-1 d-flex align-items-center justify-content-end">
                <button id="addBtn" class="add-btn d-flex justify-content-center align-items-center" type="button">
                    New Project
                    <span>
                        @include('icons.add')
                    </span>
                </button>
            </div>
        </div>
        <div class="row projects d-flex justify-content-between">
            <div class="container project-card">
                <div class="row project-title">
                    <h3>Community Name</h3>
                </div>
                <div class="row">
                    <p>Review Date</p>
                </div>
                <div class="row">
                    <p>Site Address</p>
                </div>
                <div class="row">
                    <p>Charrette Date</p>
                </div>
                <div class="row">
                    <p>Kickoff Date</p>
                </div>
            </div>
            <div class="container project-card">
                <div class="row project-title">
                    <h3>Community Name</h3>
                </div>
                <div class="row">
                    <p>Review Date</p>
                </div>
                <div class="row">
                    <p>Site Address</p>
                </div>
                <div class="row">
                    <p>Charrette Date</p>
                </div>
                <div class="row">
                    <p>Kickoff Date</p>
                </div>
            </div>
        </div>
    </div>

@endsection
