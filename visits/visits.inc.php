<?php

include "../database_conn.php";

header('Content-Type: text/plain');

if (isset($_POST['visits'])) {
    
	$recived = utf8_encode($_POST['visits']);
    $confcase = json_decode($recived);
    $boolean = $boolean->boolean;
    $user_id = $confcase->user_id;

    $insert_confcase = "INSERT INTO visits (user_id, boolean)
                    VALUES ('$user_id', '$boolean');";

    try {
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $insert_visits);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo "[SQL Success]";
    }
    catch (Exception $err) {
        echo "[SQL Failed]";
        die;
    }
}
