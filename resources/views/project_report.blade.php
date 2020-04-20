@extends('common.default')

@section('title', 'Project Report')

@section('js')
    <script src="{{ URL::asset('js/project.js') }}"></script>
    {!! $data['chart']->script() !!}
@endsection

@section('content')
    @include('common.project_header_content')

    <div class="report d-flex flex-column">
        <div class="hero d-flex">
            <h2>Here's your project overview.</h2>
            <button class="export" id="exportBtn"  data-toggle="modal" data-target="#shareModal" type="button">
                <span>
                    <i class="material-icons align-middle">share</i>
                </span>
                Export Report
            </button>
            @include('share_project')
        </div>
        <div class="scores mt-5 d-flex flex-column justify-content-center">
            <div class="row justify-content-center">
                <h1 class="mt-5">{{ $data['total'] }} Total Points</h1>
            </div>
            <div class="row">
                {!! $data['chart']->container() !!}
            </div>
        </div>
        <div class="upload-docs mb-5 d-flex justify-content-center">
            <button class="upload" id="uploadDocs" data-toggle="modal" data-target="#uploadDocsModal" type="button">
                <span>
                    <i class="material-icons align-middle">cloud_upload</i>
                </span>
                Upload Confirmation Documents
            </button>
            <div id="uploadDocsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="align-middle mb-0">Upload Confirmation Documents</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="material-icons align-middle">close</i>
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('upload') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="projectTitle" name="projectTitle" value="{{ $data['title'] }}">
                                <input type="hidden" id="projectId" name="projectId" value="{{ $data['id'] }}">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="document">
                                    <label class="custom-file-label text-truncate" for="customFile">Choose file</label>
                                </div>
                                <button type="submit" class="submit float-right mt-3">
                                    <span>
                                        <i class="material-icons align-middle">cloud_upload</i>
                                    </span>
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
