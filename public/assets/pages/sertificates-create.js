$(document).ready(function () {
    $("#form").on("submit", function (e) {
        e.preventDefault(),
            $.ajax({
                url: $(this).context.action,
                method: "POST",
                dataType: "json",
                data: $(this).serializeArray(),
                success: function (e) {
                    $("#telephone").val('');
                    $("#full_name").val('');
                    alert("Success add new sectificate");
                },
                error: function (e) {
                    alert("Error open this console !!! "  + e.responseJSON.message);
                },
            });
    });
});
