<?php
    include_once 'header.php';
?>

    <section class="index-intro">
        <h1>Welcome to User's main page</h1>
    </section>

    <?php
        if(isset($_POST['btn-r'])){
            echo 'You just reported a confirmed case!';
        }
        if(isset($_POST['btn-pc'])){
            echo 'You just reported a possible contact with a confirmed case!';
        }
        if(isset($_POST['btn-ep'])){
            echo 'You just clicked Edit profile button';
        }
    ?>
    <form method="post"> 
        <input type="submit" name="btn-r" value ="Report a confirmed case"> 
        <input type="submit" name="btn-pc" value ="Report possible contact with confirmed case"> 
        <input type="submit" name="btn-ep" value ="Edit profile"> 
    </form>
      