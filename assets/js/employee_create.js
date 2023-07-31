$(document).ready(function() {
    // Handle form submission using AJAX
    $("#addEmployeeForm").submit(function(event) {
        event.preventDefault();

        //add loading to button and make it disabled
        $("#addEmployeeForm button[type=submit]").html("Loading...").attr("disabled", true);

        // Serialize form data
        var formData = $(this).serialize();

        // AJAX request
        $.ajax({
            url: "/api/employees/create",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                console.log("Employee saved successfully.");
                alert("Employee saved successfully.");
                $("#addEmployeeForm")[0].reset();
                $("#addEmployeeForm button[type=submit]").html("Submit").attr("disabled", false);
            },
            error: function(xhr, status, error) {
                console.error("Error saving employee: " + error);
                alert("Error saving employee: " + error);
                $("#addEmployeeForm button[type=submit]").html("Submit").attr("disabled", false);
            }
        });
    });
});