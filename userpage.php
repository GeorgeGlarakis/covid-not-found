<?php
    include_once 'header.php';
?>

    <section class="index-intro">
        <h1>Welcome to User's main page</h1>
    </section>

    <?php
        if(isset($_POST['btn-u'])){
            echo 'You just reported a confirmed case!';
        }
        if(isset($_POST['btn-e'])){
            echo 'You just reported a possible contact with a confirmed case!';
        }
        if(isset($_POST['btn-dd'])){
            echo 'You just clicked Edit profile button';
        }
    ?>
    <form method="post"> 
        <input type="submit" name="btn-u" value ="Report a confirmed case"> 
        <input type="submit" name="btn-e" value ="Report possible contact with confirmed case"> 
        <input type="submit" name="btn-dd" value ="Edit profile"> 
    </form>
      