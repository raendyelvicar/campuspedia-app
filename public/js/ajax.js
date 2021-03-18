$(document).ready(function (event) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    //Edit modal window
    $(document).on("click", "#edit-contact", function (event) {
        event.preventDefault();

        var id = $(this).data("id");
        $.get("/contact/" + id, function (data) {
            $('input[name="edit_firstname"]').val(data.data.firstname);
            $('input[name="edit_lastname"]').val(data.data.lastname);
            $('input[name="edit_email"]').val(data.data.email);
            $('input[name="edit_phone_number"]').val(data.data.phone_number);
            update_contact(id);
        });
    });

    function update_contact(id) {
        if ($("#update-contact").length > 0) {
            $("#update-contact").validate({
                rules: {
                    edit_firstname: {
                        required: true,
                        maxlength: 50,
                    },
                    edit_lastname: {
                        required: true,
                        maxlength: 50,
                    },
                    edit_phone_number: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 12,
                    },
                    edit_email: {
                        required: true,
                        maxlength: 50,
                        email: true,
                    },
                },
                submitHandler: function (form) {
                    var firstname = document.getElementById("edit_firstname")
                        .value;
                    var lastname = document.getElementById("edit_lastname")
                        .value;
                    var email = document.getElementById("edit_email").value;
                    var phone_number = document.getElementById(
                        "edit_phone_number"
                    ).value;

                    $.ajax({
                        url: "http://127.0.0.1:8000/contact/" + id + "/edit",
                        type: "POST",
                        data: {
                            id: id,
                            firstname: firstname,
                            lastname: lastname,
                            email: email,
                            phone_number: phone_number,
                        },
                        dataType: "JSON",
                        success: function (response) {
                            $("#update_res_message").show();
                            $("#update_res_message").html(response.message);
                            $("#update_msg_div").removeClass("d-none");
                            setTimeout(function () {
                                $("#res_message").hide();
                                $("#msg_div").hide();
                                location.reload();
                            }, 1000);
                        },
                    });
                },
            });
        }
    }

    //Delete modal window
    $(document).on("click", "#delete-contact", function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        $("#yes").click(function () {
            $.ajax({
                url: "/contact/" + id,
                type: "POST",
                success: function (response) {
                    location.reload();
                    $("#res_message").show();
                    $("#res_message").html(response.message);
                    $("#msg_div").removeClass("d-none");
                    setTimeout(function () {
                        $("#res_message").hide();
                        $("#msg_div").hide();
                    }, 1000);
                },
            });
        });
    });
});
