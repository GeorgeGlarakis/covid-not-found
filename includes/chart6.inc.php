<?php

    include "../database_conn.php";
    header('Content-Type: text/plain');


if (isset($_POST['chart6'])) {
    //  $dateFilter = "SELECT date, COUNT(case_id) FROM covid.covid_cases WHERE date < '$maxDate' and date > '$minDate' GROUP BY date";
    $dateFilter = "SELECT date, COUNT(case_id) FROM covid.covid_cases WHERE date < '2022-08-11' and date > '2022-07-01' GROUP BY date";
       
    try {
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $dateFilter);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        while($row = mysqli_fetch_assoc($resultData)){
            $dateArray[] = $row["date"];
            $countCases[] = $row["COUNT(case_id)"];
        }
        $data = array("dateArray"=>$dateArray,"countCases"=>$countCases);
        echo json_encode($data);
    }
    catch (Exception $err) {
        echo json_encode(['error' => '[SQL Failed]']);
        // echo $err;
        die;
    }
 
   
         
} 
?>