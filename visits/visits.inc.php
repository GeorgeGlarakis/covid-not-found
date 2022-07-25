<?php

include "../database_conn.php";

header('Content-Type: text/plain');

if (isset($_POST['visits'])) {
    
	$recived = utf8_encode($_POST['visits']);
    $visits = json_decode($recived);
    $user_id = $visits->user_id;
    $poi_id = $visits->poi_id;
    $estimation = $visits->estimation;
    date_default_timezone_set("Europe/Athens");
    $visit_time =  date_create()->format('Y-m-d H:i:s');


    $insert_visits = "INSERT INTO visits (user_id, poi_id, visit_time, estimation)
                    VALUES ('$user_id', '$poi_id', '$visit_time', '$estimation');";

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
