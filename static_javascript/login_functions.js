$(document).ready(function () {

    $('#login-submit').click(function () {
        var email = document.getElementById("login-email").value;
        var password = document.getElementById("login-pwd").value;

        $.ajax( {
            url: "../includes/login.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                login: JSON.stringify({ 
                    email: email,
                    password: password
                }) 
            }, 
            success: function( response ) { 
                if (response.includes("[DONE] Logged In Successfully!")) {
                    window.location.replace("/covid-not-found/UserPanel/user.php")
                }  
                else if (response.includes("[ADMIN] Logged In Successfully!")) {
                    window.location.replace("/covid-not-found/AdminPanel/admin.php")
                }                      
            },
            error: function( error ) { console.log(error) }
        });
    });

    $('#register-submit').click(function () {
        var name = document.getElementById("register-name").value;
        var surname = document.getElementById("register-surname").value;
        var email = document.getElementById("register-email").value;
        var password = document.getElementById("register-password").value;
        var password_conf = document.getElementById("register-password-conf").value;

        $.ajax( {
            url: "../includes/login.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                register: JSON.stringify({ 
                    name: name,
                    surname: surname,
                    email: email,
                    password: password,
                    password_conf: password_conf
                })
            }, 
            success: function( response ) { console.log(response) },
            error: function( error ) { console.log(error) }
        });
    });

    $('#register-admin').click(function () {
        var name = document.getElementById("register-name").value;
        var surname = document.getElementById("register-surname").value;
        var email = document.getElementById("register-email").value;
        var password = document.getElementById("register-password").value;
        var password_conf = document.getElementById("register-password-conf").value;

        $.ajax( {
            url: "../includes/login.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                admin: JSON.stringify({ 
                    name: name,
                    surname: surname,
                    email: email,
                    password: password,
                    password_conf: password_conf
                })
            }, 
            success: function( response ) { console.log(response) },
            error: function( error ) { console.log(error) }
        });
    });

    $('#logout').click(function () {
        $.ajax( {
            url: "../includes/login.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                logout: null
            }, 
            success: function( response ) { 
                console.log(response) 
                window.location.replace('../login/login.php')
            },
            error: function( error ) { console.log(error) }
        });
    });

    $('#user_menu').click(function (e) {
        if (e.target.id == "logout") {
            $.ajax( {
                url: "../includes/login.inc.php",
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

    $('#submit-changes').click(function () {
        var name = document.getElementById("change-name").value;
        var surname = document.getElementById("change-surname").value;
        var email = document.getElementById("change-email").value;
        var password = document.getElementById("change-password").value;
        var password_conf = document.getElementById("change-password-conf").value;

        $.ajax( {
            url: "../includes/login.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                change_user: JSON.stringify({ 
                    name: name,
                    surname: surname,
                    email: email,
                    password: password,
                    password_conf: password_conf
                })
            }, 
            success: function( response ) { alert(response) },
            error: function( error ) { console.log(error) }
        });
    });
})       