$(document).ready(function() {
    // Handle form submission using AJAX
    $("#addUserForm").submit(function(event) {
        event.preventDefault();

        //add loading to button and make it disabled
        $("#addUserForm button[type=submit]").html("Loading...");

        //password and confirm password validation
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            //disable loading from button
            $("#addUserForm button[type=submit]").html("Submit");
            return false;
        }

        //user type is required
        var userType = $("#user_type").val();
        if (userType == "") {
            alert("User type is required.");
            //disable loading from button
            $("#addUserForm button[type=submit]").html("Submit");
            return false;
        }


        // Serialize form data
        var formData = $(this).serialize();

        // AJAX request
        $.ajax({
            url: "/api/users/create",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                console.log("User saved successfully.");
                alert("User saved successfully.")
                $("#addUserForm")[0].reset();
                $("#addUserForm button[type=submit]").html("Submit");
            },
            error: function(xhr, status, error) {
                console.error("Error saving user: " + error);
                alert("Error saving user: " + error);
            }
        });
    });
});