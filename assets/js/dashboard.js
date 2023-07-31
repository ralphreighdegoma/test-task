function onScanSuccess(decodedText, decodedResult) {
    // handle the scanned code as you like, for example:
    console.log(`Code matched = ${decodedText}`, decodedResult);
    debouncedLog(decodedText);
}



function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    //console.warn(`Code scan error = ${error}`);
}


var html5QrcodeScanner;

function scan() {
    html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: { width: 250, height: 250 } },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
}


function log(id) {
    //send ajax
    $.ajax({
        url: "/api/timelog/" + id,
        type: "GET",
        success: function(response) {
            console.log(response);
            //check if json
            try {

                //play audio from assets/media/log.mp3
                var audio = new Audio('/assets/media/log.mp3');
                audio.play();


                var response = JSON.parse(response);

                $.toast({
                    heading: 'Success',
                    text: response.message,
                    position: 'top-right',
                    stack: false,
                    icon: 'success'
                })

                scan()

            } catch (e) {

            }

            getLogs();
        },
        error: function(xhr, status, error) {
            console.error("Error saving user: " + error);
            alert("Error saving user: " + error);
        }
    });

}

// Debounce function
let timeoutId;

function debounce(func, delay) {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(func, delay);
}

// Create a debounced version of the log() function with 1000ms delay
const debouncedLog = (id) => debounce(() => log(id), 500); // Adjust the delay (in milliseconds) as needed


function getLogs() {

    //destory table if exists
    if ($.fn.DataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable().destroy();
    }

    $('#datatable').DataTable({
        "ajax": {
            "url": "/api/timelogs",
            "type": "GET",
            "dataSrc": "",
        },
        "ordering": false,
        "columnDefs": [
            { targets: [0], orderable: false }, // Disable sorting for the first column (index 0)
        ],
        "columns": [{
                "data": "id",
                "render": function(data, type, row) {
                    // 'data' contains the value of the id column
                    // Build the HTML structure for the QR code image and return it
                    return `
                        <img src="/qr-code-generate/${row.id}" alt="QR Code for ID ${row.id}" width="100" height="100">
                    `;
                }
            },
            { "data": "id" },
            {
                "data": "first_name",
                "render": function(data, type, row) {
                    // 'data' contains the value of the first_name column
                    // Combine first_name and last_name into a single column
                    return row.first_name + " " + row.last_name;
                }
            },
            {
                "data": "time_in",
                "render": function(data, type, row) {
                    // 'data' contains the value of the first_name column
                    // Combine first_name and last_name into a single column
                    return row.time_in;
                }
            },
            {
                "data": "timeout",
                "render": function(data, type, row) {
                    // 'data' contains the value of the first_name column
                    // Combine first_name and last_name into a single column
                    return row.time_out;
                }
            },
        ]
    });
}

//document ready
$(document).ready(function() {
    getLogs();
    scan()
});