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

    $("#saveChanges").on("click", function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var data = Object();
        var tables = $(".table");
        var BASE = window.location.pathname;

        tables.each(function(i) {
            var inputs = $("#" + this.id + ' [id*="-input"]');
            var tableData = Object();

            inputs.each(function(i) {
                var temp = Object();
                temp.cell = this.id.split("-")[0];
                temp.html = this.outerHTML;

                if (this.type === "checkbox") {
                    temp.checked = this.checked;
                    temp.value = this.dataset.value;
                } else if (this.type === "textarea") {
                    temp.value = this.value;
                }

                tableData[this.id] = temp;
            });

            data[this.id] = tableData;
        });

        $.ajax({
            type: "PUT",
            url: BASE,
            datatype: "JSON",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data: data,
            success: function(response) {
                alert("Changes saved!");
            },
            error: function(response) {
                alert("Hmm something went wrong.");
            }
        });
    });
});
