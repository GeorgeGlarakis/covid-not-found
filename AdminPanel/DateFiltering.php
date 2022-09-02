<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Filtering</title>
    <style>
      *{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(255, 26, 104, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(255, 26, 104, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(255, 26, 104, 1);
        background: white;
      }
    </style>
  </head>
  <body>
    <div class="chartMenu">
      <p>Board Chart</p>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>
    </div>

      <?php
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

        }else {
            echo 'No results in DataBase';
        }
                
        print_r($dateArray)
      ?>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // setup 
    const dateArrayJS = <?php echo json_encode($dateArray); ?>;
    console.log(dateArrayJS)
    const data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
        
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    </script>

  </body>
</html>