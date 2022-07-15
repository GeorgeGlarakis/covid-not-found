<script type ="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const dates = ['2022-07-14', '2022-07-15', '2022-07-16', '2022-07-17', '2022-07-18', '2022-07-119', '2022-07-120',];
 const datapoints = 5 ;<!-- ourdatapoints-->
 console.log(new Date ('2022-07-14'))
const data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
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
            type: 'time', 
          }  
          y: {
            beginAtZero: true
          }
        }
      }
    };
   


// config 
    const config = {
      type: 'bar',
      data: data2,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };
    
    </script>