<?php

include "../database_conn.php";

header('Content-Type: text/plain');
session_start();
$user_id = (isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : -1 );

// Confirm Covid Case Button
if (isset($_POST['confcase'])) {
    
	$received = utf8_encode($_POST['confcase']);
    $confcase = json_decode($received);
    $date = $confcase->date;

    date_default_timezone_set("Europe/Athens");
    $current_time =  date_create()->format('Y-m-d');

    // Check for recent covid case
    $recent_case = "SELECT * FROM covid_cases 
                        WHERE date > date_sub('$date', INTERVAL 14 DAY)
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

if (isset($_POST['is_admin'])) {
    if (isset($_SESSION['user_id'])) {
        $data = array('user_id' => $_SESSION['user_id'], 'user_name' => $_SESSION["user_name"], 'is_admin' => $_SESSION['is_admin']);
        echo json_encode($data);
    } else { echo "[No session running!]"; }  
}

if (isset($_POST['my_visits'])) {
    $get_my_visits = "SELECT pois.name, visit_time FROM visits INNER JOIN pois ON visits.poi_id = pois.poi_id WHERE user_id = '$user_id';";

    try {
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $get_my_visits);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
    
        while($row = mysqli_fetch_assoc($resultData)){
            $my_visits[] = array("poi_name" => $row["name"], "visit_time" => $row["visit_time"]);
        }
        echo json_encode($my_visits);
        mysqli_stmt_close($stmt);        
    }
    catch (Exception $err) {
        echo json_encode(["error" => $err]);
        die;
    } 
}

if (isset($_POST['my_cases'])) {
    $get_my_cases = "SELECT * FROM covid_cases WHERE user_id = '$user_id';";

    try {
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $get_my_cases);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        $i = 1;
        while($row = mysqli_fetch_assoc($resultData)){
            $my_cases[] = array("covid_case" => $i++, "covid_time" => $row["date"]);
        }
        echo json_encode($my_cases);
        mysqli_stmt_close($stmt);        
    }
    catch (Exception $err) {
        echo json_encode(["error" => $err]);
        die;
    }  
}

?>