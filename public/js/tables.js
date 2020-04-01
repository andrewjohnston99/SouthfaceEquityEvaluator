$(document).ready(function() {
    // Tally planned points
    var equity_planned_total = parseInt(
        $("#equity_planned").attr("data-value")
    );

    // Listen for checkbox changes
    $("#equityTable input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            // Get cell value
            var temp_int = parseInt($(this).attr("data-value"));

            // Set new cell values
            equity_planned_total += temp_int;
            $("#equity_planned").attr("data-value", equity_planned_total);
            $("#equity_planned").html(equity_planned_total);

        } else {
            var temp_int = parseInt($(this).attr("data-value"));

            if (equity_planned_total - temp_int < 0) {
                equity_planned_total = 0;
                $("#equity_planned").attr("data-value", equity_planned_total);
                $("#equity_planned").html(equity_planned_total);
            } else {
                equity_planned_total -= temp_int;
                $("#equity_planned").attr("data-value", equity_planned_total);
                $("#equity_planned").html(equity_planned_total);
            }
        }
    });

    // Tally planned points
    var services_planned_total = parseInt(
        $("#services_planned").attr("data-value")
    );

    // Listen for checkbox changes
    $("#servicesTable input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            // Get cell value
            var temp_int = parseInt($(this).attr("data-value"));

            // Set new cell values
            services_planned_total += temp_int;
            $("#services_planned").attr("data-value", services_planned_total);
            $("#services_planned").html(services_planned_total);

        } else {
            var temp_int = parseInt($(this).attr("data-value"));

            if (services_planned_total - temp_int < 0) {
                services_planned_total = 0;
                $("#services_planned").attr("data-value", services_planned_total);
                $("#services_planned").html(services_planned_total);
            } else {
                services_planned_total -= temp_int;
                $("#services_planned").attr("data-value", services_planned_total);
                $("#services_planned").html(services_planned_total);
            }
        }
    });


    // Tally planned points
    var pop_planned_total = parseInt(
        $("#pop_planned").attr("data-value")
    );

    // Listen for checkbox changes
    $("#popTable input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            // Get cell value
            var temp_int = parseInt($(this).attr("data-value"));

            // Set new cell values
            pop_planned_total += temp_int;
            $("#pop_planned").attr("data-value", pop_planned_total);
            $("#pop_planned").html(pop_planned_total);

        } else {
            var temp_int = parseInt($(this).attr("data-value"));

            if (pop_planned_total - temp_int < 0) {
                pop_planned_total = 0;
                $("#pop_planned").attr("data-value", pop_planned_total);
                $("#pop_planned").html(pop_planned_total);
            } else {
                pop_planned_total -= temp_int;
                $("#pop_planned").attr("data-value", pop_planned_total);
                $("#pop_planned").html(pop_planned_total);
            }
        }
    });


    // Tally planned points
    var comm_planned_total = parseInt(
        $("#comm_planned").attr("data-value")
    );

    // Listen for checkbox changes
    $("#commTable input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            // Get cell value
            var temp_int = parseInt($(this).attr("data-value"));

            // Set new cell values
            comm_planned_total += temp_int;
            $("#comm_planned").attr("data-value", comm_planned_total);
            $("#comm_planned").html(comm_planned_total);

        } else {
            var temp_int = parseInt($(this).attr("data-value"));

            if (comm_planned_total - temp_int < 0) {
                comm_planned_total = 0;
                $("#comm_planned").attr("data-value", comm_planned_total);
                $("#comm_planned").html(comm_planned_total);
            } else {
                comm_planned_total -= temp_int;
                $("#comm_planned").attr("data-value", comm_planned_total);
                $("#comm_planned").html(comm_planned_total);
            }
        }
    });
	

    // Tally planned points
    var housing_planned_total = parseInt(
        $("#housing_planned").attr("data-value")
    );

    // Listen for checkbox changes
    $("#housingTable input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            // Get cell value
            var temp_int = parseInt($(this).attr("data-value"));

            // Set new cell values
            housing_planned_total += temp_int;
            $("#housing_planned").attr("data-value", housing_planned_total);
            $("#housing_planned").html(housing_planned_total);

        } else {
            var temp_int = parseInt($(this).attr("data-value"));

            if (housing_planned_total - temp_int < 0) {
                housing_planned_total = 0;
                $("#housing_planned").attr("data-value", housing_planned_total);
                $("#housing_planned").html(housing_planned_total);
            } else {
                housing_planned_total -= temp_int;
                $("#housing_planned").attr("data-value", housing_planned_total);
                $("#housing_planned").html(housing_planned_total);
            }
        }
    });

    // Tally planned points
    var physical_planned_total = parseInt(
        $("#physical_planned").attr("data-value")
    );

    // Listen for checkbox changes
    $("#physicalTable input:checkbox").change(function() {
        if ($(this).is(":checked")) {
            // Get cell value
            var temp_int = parseInt($(this).attr("data-value"));

            // Set new cell values
            physical_planned_total += temp_int;
            $("#physical_planned").attr("data-value", physical_planned_total);
            $("#physical_planned").html(physical_planned_total);

        } else {
            var temp_int = parseInt($(this).attr("data-value"));

            if (physical_planned_total - temp_int < 0) {
                physical_planned_total = 0;
                $("#physical_planned").attr("data-value", physical_planned_total);
                $("#physical_planned").html(physical_planned_total);
            } else {
                physical_planned_total -= temp_int;
                $("#physical_planned").attr("data-value", physical_planned_total);
                $("#physical_planned").html(physical_planned_total);
            }
        }
    });

});
