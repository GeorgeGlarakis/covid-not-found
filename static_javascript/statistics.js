function update_chart_1() {
    $.ajax({
        url:"../includes/admincharts.inc.php",
        method:"POST",
        data:{ chart1: null },
        dataType:"text",

        success: function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("total_visits")) {
                let value = JSON.parse(response).total_visits;
                document.getElementById("chart-1").innerHTML = value;
            }
            else { console.log("Wrong response!"); }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }
    });
}

function update_chart_2() {
    $.ajax({
        url:"../includes/admincharts.inc.php",
        method:"POST",
        data:{ chart2: null },
        dataType:"text",

        success: function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("covid_cases")) {
                let value = JSON.parse(response).covid_cases;
                document.getElementById("chart-2").innerHTML = value;
            }
            else { console.log("Wrong response!"); }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }
    });
}

function update_chart_3() {
    $.ajax({
        url:"../includes/admincharts.inc.php",
        method:"POST",
        data:{ chart3: null },
        dataType:"text",

        success: function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("covid_visits")) {
                let value = JSON.parse(response).covid_visits;
                document.getElementById("chart-3").innerHTML = value;
            }
            else { console.log("Wrong response!"); }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }
    });
}

function update_chart_4() {
    $.ajax({
        url:"../includes/admincharts.inc.php",
        method:"POST",
        data:{ chart4: null },
        dataType:"text",
        
        success: function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("type")) {
                create_pie_chart('chart-4', JSON.parse(response));
            }
            else { console.log("Wrong response!"); console.log(response) }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }					
    })
}

function update_chart_5() {
    $.ajax({
        url:"../includes/admincharts.inc.php",
        method:"POST",
        data:{ chart5: null },
        dataType:"text",
        
        success:function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("visits")) {
                create_pie_chart('#chart-5', JSON.parse(response));
            }
            else { console.log("Wrong response!"); }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }					
    })
}

function update_chart_6() {
    $.ajax({
        url:"../includes/chart6.inc.php",
        method:"POST",
        data:{ chart6: null },
        dataType:"text",
        
        success:function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("dateArray")) {
                console.log(JSON.parse(response))
                create_board_chart('chart-6', JSON.parse(response));
            }
            else { console.log("Wrong response!"); }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }					
    })
}

function create_board_chart(chart_id, dataSets) {

    const data = {
        labels: dataSets.dateArray,
        datasets: [{
          label: 'Covid Cases',
          data: dataSets.countCases,
          backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(0, 0, 0, 0.2)'
          ],
          borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(0, 0, 0, 1)'
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
        document.getElementById(chart_id),
        config
      );
}

function create_pie_chart(chart_id, data) {
    var type = [];
    var visits = [];
    var color = [];

    for(var count = 0; count < data.length; count++) {
        type.push(data[count].type);
        visits.push(data[count].visits);
        color.push(data[count].color);
    }

    console.log(type)
    console.log(visits)
    console.log(color)

    var chart_data = {
        labels:type,
        datasets:[{
            label:'Vote',
            backgroundColor:color,
            color:'#fff',
            data:vitits
        }]
    };

    var options = {
        responsive:true,
        scales:{
            yAxes:[{
                ticks:{
                    min:0
                }
            }]
        }
    };

    var group_chart1 = $(chart_id);
    var graph1 = new Chart(group_chart1, {
        type:"pie",
        data:chart_data
    });
}

function update_statistics() {
    update_chart_1();
    update_chart_2();
    update_chart_3();
    update_chart_4();
    update_chart_6();
    
}

window.onload = function() {
    // populate charts
    update_statistics();
}

$(document).ready(function() {
    // create resfresh buttons
    $('#refresh-chart-1').click(function() {
        update_chart_1();
    });
    $('#refresh-chart-2').click(function() {
        update_chart_2();
    });
    $('#refresh-chart-3').click(function() {
        update_chart_3();
    });
    $('#refresh-chart-4').click(function() {
        update_chart_4();
    });
    $('#refresh-chart-5').click(function() {
        update_chart_5();
    });
    $('#refresh-chart-6').click(function() {
        update_chart_6();
    });
    $('#refresh-chart-7').click(function() {
        update_chart_7();
    });			
})

$(document).change(function() {
    // create resfresh buttons
    $('#refresh-chart-1').click(function() {
        update_chart_1();
    });
    $('#refresh-chart-2').click(function() {
        update_chart_2();
    });
    $('#refresh-chart-3').click(function() {
        update_chart_3();
    });
    $('#refresh-chart-4').click(function() {
        update_chart_4();
    });
    $('#refresh-chart-5').click(function() {
        update_chart_5();
    });
    $('#refresh-chart-6').click(function() {
        update_chart_6();
    });
    $('#refresh-chart-7').click(function() {
        update_chart_7();
    });			
})


// ------------------------------------------------------------------------------------------------------------------------------------
// Bar Chart Charts 6/7 

const dates = ['2022-07-16','2022-07-17','2022-07-18','2022-07-19','2022-07-20','2022-07-21','2022-07-22'];

const datapoints = [18, 12, 6, 9, 12, 3, 9];

const convertedDates = dates.map(date => new Date(date).setHours(0,0,0,0));

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



// Pie Chart

$(document).ready(function(){


    $('#submit_data').click(function(){

        var language = $('input[name=programming_language]:checked').val();

        // $.ajax({
        // 	url:"data.php",
        // 	method:"POST",
        // 	data:{action:'insert', language:language},
        // 	beforeSend:function() {
        // 		$('#submit_data').attr('disabled', 'disabled');
        // 	},
        // 	success:function(data) {
        // 		$('#submit_data').attr('disabled', false);
        // 		$('#programming_language_1').prop('checked', 'checked');
        // 		$('#programming_language_2').prop('checked', false);
        // 		$('#programming_language_3').prop('checked', false);
        // 		alert("Your Feedback has been send...");
        // 		makechart();
        // 	}
        // })

    });

    makechart();

    function makechart() {
        // $.ajax({
        // 	url:"data.php",
        // 	method:"POST",
        // 	data:{ action:'fetch' },
        // 	dataType:"JSON",

        // 	success:function(data) {
        // 		var language = [];
        // 		var total = [];
        // 		var color = [];

        // 		for(var count = 0; count < data.length; count++) {
        // 			language.push(data[count].language);
        // 			total.push(data[count].total);
        // 			color.push(data[count].color);
        // 		}

        // 		var chart_data = {
        // 			labels:language,
        // 			datasets:[{
        // 				label:'Vote',
        // 				backgroundColor:color,
        // 				color:'#fff',
        // 				data:total
        // 			}]
        // 		};

        // 		var options = {
        // 			responsive:true,
        // 			scales:{
        // 				yAxes:[{
        // 					ticks:{
        // 						min:0
        // 					}
        // 				}]
        // 			}
        // 		};

        // 		var group_chart1 = $('#pie_chart');
        // 		var graph1 = new Chart(group_chart1, {
        // 			type:"pie",
        // 			data:chart_data
        // 		});
        // 	}
        // })
    }
});
