$(document).ready(function() {
    $('#user_menu').click(function (e) {
        if (e.target.id == "logout") {
            $.ajax( {
                url: "../login/login.inc.php",
                dataType: "text",
                type: "POST",
                data: {
                    logout: null
                }, 
                success: function( response ) { 
                    $('#test').html(response) 
                    window.location.replace('../login/login.php')
                },
                error: function( error ) { console.log(error) }
            });
        }
    });

    $('#logout').click(function () {
        console.log('Here!');
        $.ajax( {
            url: "../login/login.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                logout: null
            }, 
            success: function( response ) { 
                $('#test').html(response) 
                window.location.replace('../login/login.php')
            },
            error: function( error ) { console.log(error) }
        });
    });
});