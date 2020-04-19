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

    $('button.delete-toggle').click(function(e) {
        e.preventDefault()();
        $('#deleteModal').modal('show');
    });
});


