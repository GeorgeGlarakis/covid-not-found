<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME | CovidNotFound</title>
    <style>
      * {
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
      <p>WELCOME to Covid Not Found</p>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>

        Start: <input id="start" type="date" min="2022-01-01" max="2022-12-31"> 
        End: <input id="end" type="date" min="2022-01-01" max="2022-12-31">
        <button onclick="filterDate()">Filter</button><br>
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    
    <script defer type="text/javascript">

    // setup 
    const dates = ['2022-07-16','2022-07-17','2022-07-18','2022-07-19','2022-07-20','2022-07-21','2022-07-22'];
   
    const datapoints = [18, 12, 6, 9, 12, 3, 9];
   
    console.log(new Date('2022-07-16'))
    const convertedDates = dates.map(date => new Date(date).setHours(0,0,0,0));
    console.log(convertedDates)

    const data = {
      labels: dates,
      datasets: [{
        label: 'Proved Cases',
        data: datapoints,
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)'          
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)'          
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
          x: {
            type:'time',
            time:{
               unit:'day'
            }            
          },
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

    function filterDate(){

        const start1 = new Date(document.getElementById('start').value);
        const start = start1.setHours(0,0,0,0);
        console.log(start)
        const end1 = new Date(document.getElementById('end').value);
        const end = end1.setHours(0,0,0,0);
        console.log(end)

        const filterDates = convertedDates.filter(date => date >=start && date <= end)
        myChart.config.data.labels = filterDates;

        const startArray = convertedDates.indexOf(filterDates[0])
        const endArray = convertedDates.indexOf(filterDates[filterDates.length-1])
        const copydatapoints = [...datapoints];
        copydatapoints.splice(endArray + 1, filterDates.length);
        copydatapoints.splice(0,startArray);
        console.log(copydatapoints)
        myChart.config.data.datasets[0].data = copydatapoints;
        myChart.update();
    }

    </script>

  </body>
</html>