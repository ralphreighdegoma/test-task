$(document).ready(function() {
    // Handle form submission using AJAX
    $("#loginForm").submit(function(event) {
        event.preventDefault();

        //add loading to button and make it disabled
        $("#loginForm button[type=submit]").html("Loading...").attr("disabled", true);

        // Serialize form data
        var formData = $(this).serialize();

        // AJAX request
        $.ajax({
            url: "/api/login",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                $("#loginForm")[0].reset();
                $("#loginForm button[type=submit]").html("Submit").attr("disabled", false);

                //parse
                if (response.status) {
                    window.location.href = "/dashboard";
                }
            },
            error: function(xhr, status, error) {
                $("#loginForm button[type=submit]").html("Submit").attr("disabled", false);
            }
        });
    });
});