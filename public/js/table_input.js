$(document).ready(function() {
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
    var equity_actual_total = 0;

    // Listen for checkbox changes
    $("#equityTable input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            // Get cell value
            var temp_int = parseInt($(this).attr("data-value"));

            // Set new cell values
            if ($(this).hasClass("planned-input")) {
                equity_planned_total += temp_int;
                $("#equity_planned").html(equity_planned_total);
            } else {
                equity_actual_total += temp_int;
                $("#equity_actual").html(equity_actual_total);
            }

            // $.ajax({
            //     type: 'POST',
            //     url: "update-project",
            //     datatype: 'JSON',
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     data: {
            //         'equity_planned_total': equity_planned_total,
            //         'equity_actual_total': equity_actual_total
            //     },
            //     success: function (response) {
            //         if (response.hasOwnProperty('equity_planned_total')) {
            //             $('#equity_planned').html(response.equity_planned);
            //         }
            //     },
            //     error: function (response) {}
            // });
        } else {
            var temp_int = parseInt($(this).attr("data-value"));

            if ($(this).hasClass("planned-input")) {
                if (equity_planned_total - temp_int < 0) {
                    equity_planned_total = 0;
                    $("#equity_planned").html(equity_planned_total);
                } else {
                    equity_planned_total -= temp_int;
                    $("#equity_planned").html(equity_planned_total);
                }
            } else {
                if (equity_actual_total - temp_int < 0) {
                    equity_actual_total = 0;
                    $("#equity_actual").html(equity_actual_total);
                } else {
                    equity_actual_total -= temp_int;
                    $("#equity_actual").html(equity_actual_total);
                }
            }
        }
    });
});
