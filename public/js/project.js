$(document).ready(function() {
    var BASE = window.location.pathname;
    var pageName = BASE.split("/").pop();
    $('#tableSelect').val(pageName);

    $("#tableSelect").change(function() {
        var selected = $(this).children("option:selected").val()
        BASE = BASE.substr(0, BASE.lastIndexOf("/") + 1);
        window.location = BASE + selected;
    });

    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $(".alert").delay(4000).fadeOut(700, function() {
        $(this).alert('close');
    });

    var curScore = parseInt($('#tableScore').attr('data-value'));


    $('input[type=checkbox]').change(function() {
        if ($(this).prop('checked') === true) {
            curScore += parseInt($(this).attr('data-value'));
        } else {
            if (parseInt($(this).attr('data-value')) > curScore) {
                curScore = 0;
            } else {
                curScore -= parseInt($(this).attr('data-value'));
            }
        }

        $('#tableScore').html(curScore);
        $('#tableScore').attr('data-value', curScore);
    });

    $('select').data('pre', parseInt($(this).children("option:selected").attr('data-value')));

    $('select').on('focus', function() {
        $('select').data('pre', parseInt($(this).children("option:selected").attr('data-value')));
    }).change(function() {
        if (($(this).children("option:selected").val() != 'undefined' && $(this).children("option:selected").val()))  {
            this.id = 'select-' + $(this).children("option:selected").val();
            this.name = 'select-' + $(this).children("option:selected").val();
        }

        var previous = $(this).data('pre');
        var points = parseInt($(this).children("option:selected").attr('data-value'));

        if (!(typeof points != 'undefined' && points) && !(typeof previous != 'undefined' && previous)) {
            return;
        } else if (typeof points != 'undefined' && points) {
            if (!(typeof previous != 'undefined' && previous)) {
                curScore += points;
            } else if (previous > points) {
                var difference = previous - points;
                if (difference > curScore) {
                    curScore = 0;
                } else {
                    curScore -= difference;
                }
            } else if (previous < points) {
                var difference = points - previous;
                curScore += difference;
            }
        } else if (typeof previous != 'undefined' && previous) {
            curScore -= previous;
        }

        $(this).data('pre', points);

        console.log($(this).children("option:selected").val() === "Select an item");


        $('#tableScore').html(curScore);
        $('#tableScore').attr('data-value', curScore);
    });

    $('input[type=number]').change(function() {
        var input = $(this).val();
        var points = $(this).attr('data-value');
        var adjusted = 0;

        if ($(this).attr('data-type') == 1) {
            adjusted = ((input/31) === 1 ? 5 : ( (0 < (input/31) && (input/31) <1 ) ? Math.round((input/31) * 4) : ((1 < (input/31) && (input/31) < 1.5) ? Math.ceil(((1.5 - (input/31)) / (1.5-1)) * 4) : 0))) + (( 11 <= input && input < 17) ? 1 : ((17 <= input && input < 22) ? 2 :((22 <= input && input < 27) ? 3 : ((27 <= input && input < 31) ? 4 :((31 <= input && input <= 37) ? 5 : 0)))));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        } else if ($(this).attr('data-type') == 2) {
            adjusted = ((input/19) === 1 ? 5 : ((0 < (input/19) && (input/19) < 1) ? Math.round((input/19) * 4) : ((1 < (input/19) && (input/19) < 1.5) ? Math.ceil(((1.5 - (input/19)) / (1.5-1)) * 4) : 0))) + ((7 <= input && input < 10) ? 1 : ((10 <= input && input < 13) ? 2 : ((13 <= input && input < 16) ? 3 : ((16 <= input && input < 19) ? 4 : ((19 <= input && input <= 23) ? 5 : 0)))));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        } else if ($(this).attr('data-type') == 3) {
            adjusted = ((input/22) === 1 ? 5 : ((0 < (input/22) && (input/22) < 1) ? Math.round((input/22) * 4) : ((1 < (input/22) && (input/22) < 1.3) ? Math.ceil(((1.3 - (input/22)) / (1.3 - 1)) * 4) : 0)));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        } else if ($(this).attr('data-type') == 4) {
            adjusted = ((input/15) === 1 ? 5 : ((0 < (input/15) && (input/15) < 1) ? Math.round((input/15) * 4) : ((1 < (input/15) && (input/15) < 1.3) ? Math.ceil(((1.3 - (input/15)) / (1.3-1)) * 4) : 0)));
            $(this).attr('data-value', adjusted);
            $('#percentPoints-' + this.id.match(/(\d+)/)[0]).html(adjusted);
        }

        if (adjusted < points) {
            var difference = points - adjusted;
            if (difference > curScore) {
                curScore = 0;
            } else {
                curScore -= difference;
            }
        } else if (adjusted > points) {
            var difference = adjusted - points;
            curScore += difference;
        }

        $('#tableScore').html(curScore);
        $('#tableScore').attr('data-value', curScore);
    });

    $('button.delete-toggle').click(function(e) {
        e.preventDefault()();
        $('#deleteModal').modal('show');
    });

    $('#saveChanges[form="tableForm"]').click(function(e) {
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


