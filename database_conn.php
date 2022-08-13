<?php

    //Connecting to the database
    $servername = "mysql.docker:3306";
    $dbusername = "covid";
    $dbpassword = "H9MKuNvX3ziTW3Vp2TeGmTxa6c8QfDM8WkeHEK2Bu3o8EmuKuqMeV4EB7ZrzKUEk";
    $dbname = "covid";

    //Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    //Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>