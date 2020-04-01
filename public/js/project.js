$(document).ready(function() {
    var tables = $(".table");

    $("#tableSelect").change(function() {
        var selected = $(this).children("option:selected").val();

        if (selected == "contact") {
            tables.addClass('d-none');
        }

        tables.each(function() {
            if (this.id == selected) {
                $(this).removeClass('d-none');
            } else {
                $(this).addClass('d-none');
            }
        });
    });

    $("#saveChanges").on("click", function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var data = Object();
        var BASE = window.location.pathname;
        BASE = BASE.replace("/edit", "");

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
