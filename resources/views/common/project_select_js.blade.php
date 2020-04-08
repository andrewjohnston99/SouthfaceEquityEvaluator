<script type="text/javascript">
    $(document).ready(function() {
        var data = @json($data['project']);
        var BASE = window.location.pathname;
        var pageName = BASE.split("/").pop();

        if (data == null) {
            return;
        }

        $.each(data, function(index, table) {
            var planned = parseInt($('#' + index.replace('Table', '') + "_planned").attr("data-value"));

            $.each(table, function(index, item) {
                var input = $('#' + item.cell + "-input")[0];

                if (input != undefined) {
                    if (input.type === 'checkbox' && item.checked === 'true') {
                        input.checked = true;
                        planned += parseInt(item.value);
                    }

                    if (input.type === 'textarea' && item.value !== null) {
                        input.value = item.value;
                    }
                }
            });

            $('#' + index.replace('Table', '') + "_planned").attr("data-value", planned);
            $('#' + index.replace('Table', '') + "_planned").html(planned);
        });

        $('#tableSelect').val(pageName);
    });
</script>
