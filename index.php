<?php>
    include_once 'header.php';
<?>

    <section class="index-intro">
        <h1>Welcome to Admin's Main Page</h1>
    </section>

    <?php
        if(isset($_POST['btn-u'])){
            echo 'You just clicked Upload button';
        }
        if(isset($_POST['btn-e'])){
            echo 'You just clicked Edit button';
        }
        if(isset($_POST['btn-dd'])){
            echo 'You just clicked Delete Data button';
        }
    ?>
    <form method="post"> 
        <input type="submit" name="btn-u" value ="Upload"> 
        <input type="submit" name="btn-e" value ="Edit"> 
        <input type="submit" name="btn-dd" value ="Delete Data"> 
    </form>
      