@extends('common.default')

@section('title', 'Affordability Worksheet')

{{-- @include('common.project-header') --}}

@section('css')
    <style>
        html, body {
            margin-top: 0;
        }
    </style>
@endsection

@section('content')

    <!-- Just put affordability table diirectly in this file -->
    <div id="affordability" class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="table-secondary">
                <td class="text-center"> Affordable Housing Category</td>
                <td class="text-center"> Actual Percentage</td>
                <td class="text-center"> Ideal Percentage</td>
                <td class="text-center"> Awarded Points</td>
            </tr>
        </thead>
        <tbody>
            <tr class="table-center">
                <td class="text-center"> ELI</td>
                <td class="text-center"> 0</td>
                <td class="text-center"> 19</td>
                <td class="text-center"> 0</td>
            </tr>
            <tr class="table-center">
                <td class="text-center"> VLI</td>
                <td class="text-center"> 0</td>
                <td class="text-center"> 10</td>
                <td class="text-center"> 0</td>
            </tr>
            <tr class="table-center">
                <td class="text-center"> LI</td>
                <td class="text-center"> 0</td>
                <td class="text-center"> 13</td>
                <td class="text-center"> 0</td>
            </tr>
            <tr class="table-center">
                <td class="text-center"> Workforce</td>
                <td class="text-center"> 0</td>
                <td class="text-center"> 12</td>
                <td class="text-center"> 0</td>
            </tr>
        </tbody>


@endsection
