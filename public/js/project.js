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
});
