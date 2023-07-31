$(document).ready(function() {
    // Initialize the datatable
    $('#datatable').DataTable({
        "ajax": {
            "url": "/api/users",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "username" },
            {
                "data": "user_type",
                "render": function(data, type, row) {
                    // 'data' contains the value of the first_name column
                    // Combine first_name and last_name into a single column
                    return row.user_type == 1 ? 'Super Admin' : 'Admin';
                }
            },
            { "data": "id" }
            // Add more column definitions here as needed
        ]
    });
});