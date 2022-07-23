<?php

include "../../database_conn.php";

header('Content-Type: text/plain');

if (isset($_POST['confcase'])) {
    
	$recived = utf8_encode($_POST['confcase']);
    $confcase_crd = json_decode($recived);
    $date = $confcase_crd->date;
   // $user_id = $confcase_crd->user_id;

    // require_once '/database_conn.php';
    // require_once 'functions.inc.php';

    if (emptyInputLogin($date) !== false) {
            echo '[ERROR] emptyinput';
            exit();
    }
    loginUser($conn, $email, $password);
}