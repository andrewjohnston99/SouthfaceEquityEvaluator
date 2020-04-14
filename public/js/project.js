$(document).ready(function() {
    var BASE = window.location.pathname;
    var pageName = BASE.split("/").pop();
    $('#tableSelect').val(pageName);

    $("#tableSelect").change(function() {
        var selected = $(this).children("option:selected").val()
        BASE = BASE.substr(0, BASE.lastIndexOf("/") + 1);
        window.location = BASE + selected;
    });

    $(".alert").delay(4000).fadeOut(700, function() {
        $(this).alert('close');
    });
});
