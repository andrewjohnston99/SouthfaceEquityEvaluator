$(document).ready(function() {
    var BASE = window.location.pathname;
    var pageName = BASE.split("/").pop();
    $('#tableSelect').val(pageName);

    $("#tableSelect").change(function() {
        var selected = $(this).children("option:selected").val()
        BASE = BASE.substr(0, BASE.lastIndexOf("/") + 1);
        window.location = BASE + selected;
    });

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $(".alert").delay(4000).fadeOut(700, function() {
        $(this).alert('close');
    });

    var curScore = parseInt($('#tableScore').attr('data-value'));

    $(':input').change(function() {
        if (this.type === 'checkbox') {
            if ($('#' + this.id).is('checked') === true) {
                curScore += parseInt($('#' + this.id).attr('data-value'));
            } else {
                if (parseInt($('#' + this.id).attr('data-value')) > curScore) {
                    curScore = 0;
                } else {
                    curScore -= parseInt($('#' + this.id).attr('data-value'));
                }
            }
        }

        $('#tableScore').html(curScore);
        $('#tableScore').attr('data-value', curScore);
    });

    $('button.delete-toggle').click(function(e) {
        e.preventDefault()();
        $('#deleteModal').modal('show');
    });

    $('input[type=number]').change(function() {
        var input = $(this).val();

        if ($(this).attr('data-type') == 1) {
            var adjusted = ((input/31) === 1 ? 5 : ( (0 < (input/31) && (input/31) <1 ) ? Math.round((input/31) * 4) : ((1 < (input/31) && (input/31) < 1.5) ? Math.ceil(((1.5 - (input/31)) / (1.5-1)) * 4) : 0))) + (( 11 <= input && input < 17) ? 1 : ((17 <= input && input < 22) ? 2 :((22 <= input && input < 27) ? 3 : ((27 <= input && input < 31) ? 4 :((31 <= input && input <= 37) ? 5 : 0)))));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        } else if ($(this).attr('data-type') == 2) {
            var adjusted = ((input/19) === 1 ? 5 : ((0 < (input/19) && (input/19) < 1) ? Math.round((input/19) * 4) : ((1 < (input/19) && (input/19) < 1.5) ? Math.ceil(((1.5 - (input/19)) / (1.5-1)) * 4) : 0))) + ((7 <= input && input < 10) ? 1 : ((10 <= input && input < 13) ? 2 : ((13 <= input && input < 16) ? 3 : ((16 <= input && input < 19) ? 4 : ((19 <= input && input <= 23) ? 5 : 0)))));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        } else if ($(this).attr('data-type') == 3) {
            var adjusted = ((input/22) === 1 ? 5 : ((0 < (input/22) && (input/22) < 1) ? Math.round((input/22) * 4) : ((1 < (input/22) && (input/22) < 1.3) ? Math.ceil(((1.3 - (input/22)) / (1.3 - 1)) * 4) : 0)));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        } else if ($(this).attr('data-type') == 4) {
            var adjusted = ((input/15) === 1 ? 5 : ((0 < (input/15) && (input/15) < 1) ? Math.round((input/15) * 4) : ((1 < (input/15) && (input/15) < 1.3) ? Math.ceil(((1.3 - (input/15)) / (1.3-1)) * 4) : 0)));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        }
    });

    $('#saveChanges').click(function(e) {
        e.preventDefault();

        var data = $('#tableForm').serializeArray();

        $(data).each(function(i, field) {
            if (field.name.includes('percent') && $('#' + field.name).attr('data-value') != "") {
                var name = 'val-' + field.name;
                var val = $('#' + field.name).attr('data-value');
                $('#tableForm').append('<input type="hidden" name="' + name + '" value="' + val + '" /> ');
            }
        });

        $('#tableForm').submit();
    });
});
