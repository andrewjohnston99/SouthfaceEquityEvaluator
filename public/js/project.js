$(document).ready(function() {
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

    $('#saveChanges').on('click', function(e) {
        e.preventDefault();

        var data = Object();
        var tables = $('.table');
        var tableData = [];

        tables.each(function(i) {
            var inputs = $('#' + this.id + ' [id*="-input"]');

            inputs.each(function(i) {
                var temp = Object();
                temp.id = this.id;
                temp.cell = this.id.split('-')[0];

                if (this.type === "checkbox") {
                    temp.checked = this.checked;
                    temp.value = this.dataset.value;
                } else if (this.type === "textarea") {
                    temp.content = this.value;
                }

                tableData.push(temp);
            });

            data[this.id] = tableData;
        });

        $.ajax({
            type: "POST",
            url: "save-project",
            datatype: "JSON",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: data,
            success: function(response) {

            },
            error: function(response) {}
        });
    });

    $('button#project-*').on('click', function(e) {
        e.preventDefault();

        var id = this.id.split('-')[1];

        $.ajax({
            type: "GET",
            url: "get-project",
            data: {id: id},
            success: function(response){},
            error: function(response){}
        });
    });
});
