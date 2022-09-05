// Confirm Covid Case Button
$(document).ready(function () {

    // Show / Hide the option to log in as Admin
    $.ajax( {
        url: "../includes/user.inc.php",
        dataType: "text",
        type: "POST",
        data: {
            is_admin: "NULL"
        }, 
        success: function( response ) { 
            if (response.includes("user_id")) {
                if (JSON.parse(response).is_admin == 1) {
                    $('#log_admin').css("display","block")
                }
                else if (JSON.parse(response).is_admin == 0) {
                    $('#log_admin').css("display","none")
                }
            }
            else if (response.includes("No session running!")) {
                $('#log_admin').css("display","none")
                console.log(response)
            }
        },
        error: function( error ) { console.log(error) }
    });

    $('#confcase-submit').click(function () {
        
        var date = document.getElementById("confcase-date").value;

        $.ajax( {
            url: "../includes/user.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                confcase: JSON.stringify({ 
                    date: date
                })
            }, 
            success: function( response ) { 
                if (response.includes("[SQL Success]")) {
                    $('#confcase-submit').removeClass("btn-danger");
                    $('#confcase-submit').addClass("btn-dark disabled");
                }
                else if (response.includes("[Recent case exists]")) {
                    $('#recent_case').html("<p id='recent_alert'>There is already a recent case!</p>")
                    $('#recent_alert').addClass("bg-danger text-white text-center font-weight-bold rounded d-flex align-middle mb-1 py-2 px-3")
                    $('#confcase-submit').removeClass("btn-danger");
                    $('#confcase-submit').addClass("btn-dark disabled");
                }
                else if (response.includes("[SQL Failed]")) {
                    alert("Database error!");
                }
            },
            error: function( error ) { console.log(error) }
        });
    });
    
});