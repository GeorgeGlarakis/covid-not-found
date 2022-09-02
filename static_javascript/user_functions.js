// Confirm Covid Case Button
$(document).ready(function () {
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
                    $('#recent_case').html("<p>There is already a recent case!</p>")
                }
                else if (response.includes("[SQL Failed]")) {
                    alert("Database error!");
                }
            },
            error: function( error ) { console.log(error) }
        });
    });
});