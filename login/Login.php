<!-- <?php
    include_once 'header.php';
    ?> -->
    
    <section class="login-form">
        <h2>Log In</h2>
        <div calss="singup-form-form">
            <form action="login.inc.php"  method="post">
             <input type="text" name="name" placeholder="Username/Email...">
             <input type="password" name="pwd" placeholder="Password...">
             <button type="submit" name="submit">Log In</button>
           </form> 
        </div> 
    </section>

    <section class="register-form">
        <div class="register-form">
            <h2>Register</h2>
            <form action="includes/register.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="username" placeholder="Username...">
                <input type="password" name="password" placeholder="Password...">
                <input type="password" name="password-conf" placeholder="Password Confirmation...">
                <button type="submit" name="submit">Register</button>
            </form> 
        </div>
    </section>
    
    <!-- <?php
        include_once 'footer.php'
    ?> -->