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
    <script type="text/javascript">
            $(document).ready(function() {
                var data = @json($data['project']);

                if (data == null) {
                    return;
                }

                $.each(data, function(index, table) {
                    var planned = parseInt($('#' + index.replace('Table', '') + "_planned").attr("data-value"));
                    var actual = parseInt($('#' + index.replace('Table', '') + "_actual").attr("data-value"));

                    $.each(table, function(index, item) {
                        var input = $('#' + item.cell + "-input")[0];

                        if (input != undefined) {
                            if (input.type === 'checkbox' && item.checked === 'true') {
                                input.checked = true;
                                planned += parseInt(item.value);
                            }

                            if (input.type === 'textarea' && item.value !== null) {
                                input.value = item.value;
                            }
                        }
                    });

                    $('#' + index.replace('Table', '') + "_planned").attr("data-value", planned);
                    $('#' + index.replace('Table', '') + "_planned").html(planned);
                });
            });
    </script>
    <script src="{{ URL::asset('js/project.js') }}"></script>
    <script src="{{ URL::asset('js/tables.js') }}"></script>
@endsection

@section('content')

    @include('project_header_content')

    <div class="row info">
        <i class="material-icons align-middle">info</i>
        <p>Click on any of the items in the sidebar to get more information.</p>
    </div>

    <div class="row project-content">
        <div class="col-2 sidebar">
            @include('common.project_sidebar')
        </div>

        <div class="col-10">
            @include('tables.contact')
        </div>
    </div>
@endsection


