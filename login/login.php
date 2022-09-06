<?php
    session_start();
    if(isset($_SESSION['user_id'])) {
        if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
            $uri = 'https://';
        } else {
            $uri = 'http://';
        }
        $uri .= $_SERVER['HTTP_HOST'];
        // echo "User ID is set!";
        if (isset($_SESSION['is_admin']) &&  $_SESSION['is_admin'] == 1) {
            // echo "IS ADMIN is set!";
            header('Location: '.$uri.'/covid-not-found/AdminPanel/admin.php');
        } else {
            // echo "Plain User";
            header('Location: '.$uri.'/covid-not-found/UserPanel/user.php');
        }
    }
?>

    
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
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"        
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		
    <script src="../static_javascript/login_functions.js"></script>
    
<?php
    include_once '../footer.php'
?>