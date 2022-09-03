<?php

	include "../database_conn.php";
    header('Content-Type: text/plain');
	
    if (isset($_POST['chart1'])) {
        // Fetch num of Total Visits that have been registered in the DB
        $fetch_visits = "SELECT COUNT(*) FROM visits";

        try {
            $stmt = mysqli_stmt_init($conn);
        
            mysqli_stmt_prepare($stmt, $fetch_visits);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($resultData);
    
            $total_visits = array(
                'total_visits' => $row['COUNT(*)']
            );
            echo json_encode($total_visits);
            mysqli_stmt_close($stmt);
        }
        catch (Exception $err) {
            echo json_encode(['error' => '[SQL Failed]']);
            die;
        }
    }

    if (isset($_POST['chart2'])) {
        // Fetch num of Total Confirmed Cases that have been registered in the DB
        $fetch_covid = "SELECT COUNT(*) FROM covid_cases";

        try {
            $stmt = mysqli_stmt_init($conn);
        
            mysqli_stmt_prepare($stmt, $fetch_covid);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($resultData);
    
            $covid_cases = array(
                'covid_cases' => $row['COUNT(*)']
            );
            echo json_encode($covid_cases);
            mysqli_stmt_close($stmt);
        }
        catch (Exception $err) {
            echo json_encode(['error' => '[SQL Failed]']);
            die;
        }
    }

    if (isset($_POST['chart3'])) {
        // Fetch num of Total Visits of Confirmed Cases that have been registered in the DB
        $fetch_visits_visits = "SELECT COUNT(*) FROM visits
            INNER JOIN covid_cases ON visits.user_id = covid_cases.user_id
            WHERE ( visits.visit_time >= covid_cases.date 
                    AND date_sub(visits.visit_time, INTERVAL 7 DAY) <= covid_cases.date )
                OR ( visits.visit_time < covid_cases.date 
                    AND date_add(visits.visit_time, INTERVAL 14 DAY) >= covid_cases.date )";

        try {
            $stmt = mysqli_stmt_init($conn);
        
            mysqli_stmt_prepare($stmt, $fetch_visits_visits);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($resultData);
    
            $covid_visits = array(
                'covid_visits' => $row['COUNT(*)']
            );
            echo json_encode($covid_visits);
            mysqli_stmt_close($stmt);
        }
        catch (Exception $err) {
            echo json_encode(['error' => '[SQL Failed]']);
            die;
        }
    }
    
    if (isset($_POST['chart4'])) {
        // Fetch num of Visits to each POI type that have been registered in the DB
        $fetch_visit_types = "SELECT types.name, COUNT(visits.visit_id) AS visits FROM visits
            INNER JOIN pois_type ON visits.poi_id = pois_type.poi_id
            INNER JOIN types ON pois_type.type_id = types.type_id
            GROUP BY types.name";

        try {
            $stmt = mysqli_stmt_init($conn);
        
            mysqli_stmt_prepare($stmt, $fetch_visit_types);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            
            while($row = mysqli_fetch_assoc($resultData)){
                // $visit_types[] = array(
                //     'type' => $row['name'],
                //     'visits' => $row['COUNT(visits.visit_id)'],
                //     'color'	=> '#' . rand(100000, 999999) . ''
                // );
                $type[] = $row['name'];
                $visits[] = $row['visits'];
                $color[] = 'rgb(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ')';
            }            
            $visit_types = array('type' => $type, 'visits' => $visits, 'color' => $color);
            echo json_encode($visit_types);
            mysqli_stmt_close($stmt);
        }
        catch (Exception $err) {
            echo $err;
            // echo json_encode(['error' => '[SQL Failed]']);
            die;
        }
    }  

    if (isset($_POST['chart5'])) {
        // Fetch num of Covid Visits to each POI type that have been registered in the DB
        $fetch_covid_visit_types = "SELECT types.name, COUNT(visits.visit_id) FROM covid_cases
            INNER JOIN visits ON visits.user_id = covid_cases.user_id
            INNER JOIN pois_type ON visits.poi_id = pois_type.poi_id
            INNER JOIN types ON pois_type.type_id = types.type_id
            WHERE ( visits.visit_time >= covid_cases.date 
                    AND date_sub(visits.visit_time, INTERVAL 7 DAY) <= covid_cases.date )
                OR ( visits.visit_time < covid_cases.date 
                    AND date_add(visits.visit_time, INTERVAL 14 DAY) >= covid_cases.date )
            GROUP BY types.name";

        try {
            $stmt = mysqli_stmt_init($conn);
        
            mysqli_stmt_prepare($stmt, $fetch_covid_visit_types);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($resultData);
    
            // while($row){
            //     $covid_visit_types = array(
            //         'type' => $row['name'],
            //         'visits' => $row['COUNT(visits.visit_id)'],
            //         'color'	=> '#' . rand(100000, 999999) . ''
            //     );
            // }
            echo json_encode($covid_visit_types);
            mysqli_stmt_close($stmt);
        }
        catch (Exception $err) {
            echo json_encode(['error' => '[SQL Failed]']);
            die;
        }
    } 
    
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