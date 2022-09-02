<?php

    include "../database_conn.php";
    header('Content-Type: text/plain');


if (isset($_POST['chart6'])) {
     //  $dateFilter = "SELECT date, COUNT(case_id) FROM covid.covid_cases WHERE date < '$maxDate' and date > '$minDate' GROUP BY date";
     $dateFilter = "SELECT date, COUNT(case_id) FROM covid.covid_cases WHERE date < '2020-01-03' and date > '2020-01-01' GROUP BY date";
       
     try {
         $stmt = mysqli_stmt_init($conn);
         mysqli_stmt_prepare($stmt, $dateFilter);
         mysqli_stmt_execute($stmt);
     }
     catch (Exception $err) {
         $error = array("error"=>"[SQL Error]");
         echo json_encode($error);
         die;
     }
 
     $resultData = mysqli_stmt_get_result($stmt);
     if($resultData->rowCount() > 0 ){
         while($row = $resultData->fetch()){
             $dateArray[] = $row["date"];
             $priceArray[] = $row["COUNT(case_id)"];
         }
         $data = array("dateArray"=>$dataArray,"priceArray"=>$priceArray);
         echo json_encode($data);
         



     }else {
         echo 'No results in DataBase';
     }
             
     print_r($dateArray)
} 
?>