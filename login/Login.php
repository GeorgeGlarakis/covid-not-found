<!-- <?php
    include_once 'header.php';
?> -->
    
    <section class="login-form">
        <h2>Log In</h2>
        <div class="singup-form-form">
            <input type="text" id="login-email" placeholder="Email...">
            <input type="password" id="login-pwd" placeholder="Password...">
            <button id="login-submit">Log In</button>
        </div> 
    </section>

    <section class="register-form">
        <div class="register-form">
            <h2>Register</h2>
            <input type="text" id="register-name" placeholder="Name...">
            <input type="text" id="register-surname" placeholder="Surname...">
            <input type="text" id="register-email" placeholder="Email...">
            <input type="password" id="register-password" placeholder="Password...">
            <input type="password" id="register-password-conf" placeholder="Password Confirmation...">
            <button id="register-submit">Register</button>
        </div>
    </section>

    <section class="logout">
        <br>
        <button id="logout">Log out</button>
        <br>
        <p id="test"> </p>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"        
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		

    <script defer type="text/javascript">
                
        $(document).ready(function () {

            $('#login-submit').click(function () {
                var email = document.getElementById("login-email").value;
                var password = document.getElementById("login-pwd").value;

                $.ajax( {
                    url: "login.inc.php",
                    dataType: "text",
                    type: "POST",
                    data: {
                        login: JSON.stringify({ 
                            email: email,
                            password: password
                        })
                    }, 
                    success: function( response ) { $('#test').html(response) },
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
                    url: "includes/login.inc.php",
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
                    success: function( response ) { $('#test').html(response) },
                    error: function( error ) { console.log(error) }
                });
            });
        })           
    </script>
    
<!-- <?php
    include_once 'footer.php'
?> -->