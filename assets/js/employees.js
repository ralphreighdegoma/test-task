$(document).ready(function() {
    // Initialize the datatable
    $('#datatable').DataTable({
        "ajax": {
            "url": "/api/employees",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            {
                "data": "first_name",
                "render": function(data, type, row) {
                    // 'data' contains the value of the first_name column
                    // Combine first_name and last_name into a single column
                    return row.first_name + " " + row.last_name;
                }
            },
            { "data": "created_by" },
            {
                "data": "id",
                "render": function(data, type, row) {
                    // 'data' contains the value of the id column
                    // Build the HTML structure for the QR code image and return it
                    return `
                        <img src="/qr-code-generate/${row.id}" alt="QR Code for ID ${row.id}" width="100" height="100">
                    `;
                }
            },
            {
                "data": "id",
                "render": function(data, type, row) {
                    // 'data' contains the value of the id column
                    // Build the HTML structure and return it
                    return `
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-flat">Action</button>
                            <button type="button" class="btn btn-primary btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                        </div>
                    `;
                }
            }
        ]
    });
});
''