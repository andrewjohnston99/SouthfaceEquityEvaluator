$document.ready(function() {
    
    // Get values from text inputs in gen equity table
    var g10_input = $("#g10 input").val();
    var h10_input = $("#h10 input").val();
    var g11_input = $("#g11 input").val();
    var h11_input = $("#h11 input").val();
    var g12_input = $("#g12 input").val();
    var h12_input = $("#h12 input").val();
    var g13_input = $("#g13 input").val();
    var h13_input = $("#h13 input").val();
    var g14_input = $("#g14 input").val();
    var h14_input = $("#h14 input").val();
    var g15_input = $("#g15 input").val();
    var h15_input = $("#h15 input").val();

    // Tally planned points
    var equity_planned_total = 0;
     
    // Listen for checkbox changes
    $("#equityTable input:checkbox").change( function() {
        if ($(this).is(':checked')) {
            // Get cell value and add to equity_planned_total
            var temp_int = parseInt($(this).val());
            equity_planned_total += temp_int;

            $.ajax({
                method: "POST",
                url: "project/get"

        }
    });
});

