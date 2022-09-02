<?php

include "../database_conn.php";

header('Content-Type: text/plain');

if (isset($_POST['confcase'])) {
    
	$received = utf8_encode($_POST['confcase']);
    $confcase = json_decode($received);
    $date = $confcase->date;
    $user_id = $confcase->user_id;

    $insert_confcase = "INSERT INTO covid_cases (user_id, date)
                    VALUES ('$user_id', '$date');";

    try {
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $insert_confcase);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo "[SQL Success]";
    }
    catch (Exception $err) {
        echo "[SQL Failed]";
        die;
    }
}
