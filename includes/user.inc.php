<?php

include "../database_conn.php";

header('Content-Type: text/plain');

// Confirm Covid Case Button
if (isset($_POST['confcase'])) {
    
	$received = utf8_encode($_POST['confcase']);
    $confcase = json_decode($received);
    $date = $confcase->date;
    $user_id = $_SESSION["user_id"];

    date_default_timezone_set("Europe/Athens");
    $current_time =  date_create()->format('Y-m-d');

    // Check for recent covid case
    $recent_case = "SELECT * FROM covid_case 
                        WHERE date > date_sub('$current_time', INTERVAL 14 DAY)
                        AND user_id = '$user_id'; ";

    try {
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $recent_case);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);
        if (!$row) { 
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
        else { echo "[Recent case exists]"; }                

        mysqli_stmt_close($stmt);
    }
    catch (Exception $err) {
        echo "[SQL Failed]";
        die;
    }
}

?>