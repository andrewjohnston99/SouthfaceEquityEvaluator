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
    <script type="text/javascript">
            $(document).ready(function() {
                var data = @json($project);

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


