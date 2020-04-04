$(document).ready(function() {
    $("#tableSelect").change(function() {
        var BASE = window.location.pathname;
        BASE = BASE.substr(0, BASE.lastIndexOf("/") + 1);
        window.location = BASE + $(this).children("option:selected").val();
    });

    $("#saveChanges").on("click", function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var data = Object();
        var tables = $(".table");
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
