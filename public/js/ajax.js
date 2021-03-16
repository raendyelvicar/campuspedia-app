$(document).ready(function (event) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //Edit modal window
    $(document).on("click", "#edit-news", function (event) {
        event.preventDefault();
        // $("#update-form").modal("show");

        var id = $(this).data("id");
        $.get("/news/" + id, function (data) {
            $('input[name="file"]').val(data.data.file);
            $('input[name="category"]').val(data.data.category);
            $('input[name="author"]').val(data.data.author);
            $('input[name="title"]').val(data.data.title);
            $('input[name="content"]').val(data.data.content);
        });
    });

    //Delete modal window
    $(document).on("click", "#delete-news", function (event) {
        event.preventDefault();

        var id = $(this).data("id");
        $("#yes").click(function () {
            $.ajax({
                url: "/news/" + id,
                type: "POST",
                success: function (response) {
                    alert(response.message);
                    location.reload();
                },
            });
        });
    });
});
