@extends('common.default')

@section('title', 'Pricing')

@section('content')

    @include('common.header')

    <div class="pricing">
        <div class="row mt-5 mb-5 justify-content-center">
            <h1>Accessibility Made Simple</h1>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col">
                <div class="card">
                    <h2 class="mb-4 text-center">Community</h2>
                    <ul>
                        <li>Print/download/email a report</li>
                        <li>Help form</li>
                        <li>Create multiple projects</li>
                        <li>Save projects</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <h2 class="mb-4 text-center">Enterprise</h2>
                    <ul>
                        <li>Print/download/email a report</li>
                        <li>Help form</li>
                        <li>Create multiple projects</li>
                        <li>Save projects</li>
                        <li>Customize tool</li>
                        <li>Deeper technical assistance</li>
                        <li>Community engagement support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
