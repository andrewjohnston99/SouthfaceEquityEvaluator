@extends('common.default')

@section('title', 'Pricing Page')

@section('css')
    <style>
        html, body {
            margin-top: 0;
        }

        .accent {
            margin-top: 50px;
            justify-content: center;
            text-align: center;
        }

        .example1 {
            position:fixed;
            text-align: center;
            border: 1px solid;
            text-align: center;
            padding: 10px;
            box-shadow: 5px 10px #888888;
            width: 400px;
            height: 700px;
        }

        .example2 {
            position:fixed;
            text-align: center;
            border: 1px solid;
            padding: 10px;
            margin-left: 400px;
            box-shadow: 5px 10px #888888;
            width: 400px;
            height: 700px;
        }

        .example3 {
            position:fixed;
            text-align: center;
            float:none;
            border: 1px solid;
            padding: 10px;
            margin-left: 800px;
            box-shadow: 5px 10px #888888;
            width: 400px;
            height: 700px;
        }

        .list {
            margin-top: 20%;
            margin-left: 10%;
            text-align: left;
        }

        .text {
            text-align: center;
            text-emphasis: bold;
            font-size: 40px;
            margin-top: 5%;
        }
    </style>
@endsection

@section('content')

    @include('common.header')

    <div className="info" class="about container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="accent"></div>
                </div>

                <div class="row">
                    <h1 class="accent">Accessibility Made Simple</h1>
                </div>
                <div class ="row">
                    <div class=col>
                        <div class="example1">
                            <div class=text>Unregistered</div>
                            <div class=list>
                                <li>Create a project</li>
                                <li>Print/download/email a report</li>
                                <li>Help form</li>
                            </div>
                        </div>
                    </div>
                    <div class=col>
                        <div class="example2">
                            <div class="text">Community</div>
                            <div class=list>
                                <li>Create a project</li>
                                <li>Print/download/email a report</li>
                                <li>Help form</li>
                                <li>Log In</li>
                                <li>Create multiple projects</li>
                                <li>Save a project</li>
                            </div>
                        </div>
                    </div>
                    <div class=col>
                        <div class="example3">
                            <div class="text">Enterprise</div>
                            <div class=list>
                                <li>Create a project</li>
                                <li>Print/download/email a report</li>
                                <li>Help form</li>
                                <li>Log In</li>
                                <li>Create multiple projects</li>
                                <li>Save a project</li>
                                <li>Customize tool</li>
                                <li>Deeper technical assistance</li>
                                <li>Community engagement support</li>
                            </div>
                        </div>
                    </div>
                </div>
        </div>


@endsection
