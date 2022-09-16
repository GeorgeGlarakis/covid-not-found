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
            else if (response.includes("visits")) {
                create_pie_chart('#chart-4', JSON.parse(response));
            }
            else { console.log("Wrong response!"); }
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

function update_chart_6(minDate, maxDate, visits, confcases) {
    $.ajax({
        url:"../includes/admincharts.inc.php",
        method:"POST",
        data:{ chart6: JSON.stringify({
                minDate, 
                maxDate,
                visits,
                confcases
            }) 
        },
        dataType:"text",
        
        success:function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("dateArray")) {
                create_board_chart6('#chart-6', JSON.parse(response));
            }
            else { console.log("Wrong response!"); }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }					
    })
}

function update_chart_7(myDate) {
    $.ajax({
        url:"../includes/admincharts.inc.php",
        method:"POST",
        data:{ chart7: JSON.stringify({
                myDate
            }) 
        },
        dataType:"text",
        
        success:function( response ) {
            if (response.includes("error")) {
                let error = JSON.parse(response);
                console.log(error.error);
            }
            else if (response.includes("date_visits")) {
                create_board_chart7('#chart-7', JSON.parse(response));
            }
            else { console.log("Wrong response!"); }
        },
        error: function( xhr, ajaxOptions, thrownError ) {
            console.log("AJAX Error:" + xhr.status)
            console.log("Thrown Error:" + thrownError)
        }					
    })
}

function create_pie_chart(chart_id, data) {

    var chart_data = {
        labels: data.type,
        datasets:[{
            label:'Vote',
            backgroundColor: data.color,
            color:'#fff',
            data: data.visits
        }]
    };

    new Chart( $(chart_id), {
        type: "pie",
        data: chart_data
    });
}

function create_board_chart6(chart_id, dataSets) {

    var label_dates = [];
    var dates = []
    var countVisits = [];
    var countCaseVisits = [];
    var bg_color = [];
    var border_color = [];
    var index = -1;
    dataSets.dateArray.forEach(date => {
        this_date = new Date(date).getDate();
        if (this_date == dates[index]) { countVisits[index]++; }
        else { index++; 
            dates[index] = this_date;
            label_dates[index] = new Date(date).toDateString(); 
            countVisits[index] = 1; 
            let color = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', '
            bg_color[index] = color + '0.4)'
            border_color[index] = color + '1)'
        }
    })  

    let chart_datasets = [{
            label: 'Visits',
            data: countVisits,
            backgroundColor: bg_color,
            borderColor: border_color,
            borderWidth: 1
        }];

    if (dataSets.hasOwnProperty('caseArray')) {
        var index = -1;
        dataSets.caseArray.forEach(date => {
            this_date = new Date(date).getDate();
            if (this_date == dates[index]) { countCaseVisits[index]++; }
            else { index++; 
                if (this_date == dates[index]) {
                    countCaseVisits[index] = 1;
                }                 
            }
        })  

        chart_datasets.push({
            label: 'Covid Cases',
            data: countCaseVisits,
            backgroundColor: bg_color,
            borderColor: border_color,
            borderWidth: 1
        })        
    }
    
    const chart_data = {
        labels: label_dates,
        datasets: chart_datasets
    };
  
    new Chart( $(chart_id),
        {
            type: 'bar',
            data: chart_data,
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            }
        }
    );
}

function create_board_chart7(chart_id, dataSets) {

    // Count the visits per hour
    var hours = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    dataSets.date_visits.forEach( hour => {
        let i = new Date(hour).getHours()
        hours[i]++;
    })

    // Create random colors for the bars 
    var bg_color = []
    var border_color = []
    for (var n=0; n<24; n++){
        let color = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', '
        bg_color[n] = color + '0.4)'
        border_color[n] = color + '1)'
    }

    const chart_data = {
        labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00',
                 '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', 
                 '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', 
                 '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'],
        datasets: [{
            label: 'Covid Cases',
            data: hours,
            backgroundColor: bg_color,
            borderColor: border_color,
            borderWidth: 1
        }]
    };

    new Chart( $(chart_id),
        {
            type: 'bar',
            data: chart_data,
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            }
        }
    );
}

// window.onload = function() {
//     // populate charts
//     update_chart_1();
//     update_chart_2();
//     update_chart_3();
//     update_chart_4();
//     update_chart_5();
//     update_chart_6('2022-07-31', '2022-09-30');
//     update_chart_7('2022-08-12');
// }

$(document).ready(function() {
    // populate charts
    update_chart_1();
    update_chart_2();
    update_chart_3();
    update_chart_4();
    update_chart_5();
    update_chart_6('2022-07-31', '2022-09-30');
    // update_chart_7('2022-08-12');

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
    $('#filter-chart-6').click(function() {
        let minDate = $('#chart6-minDate').val()
        let maxDate = $('#chart6-maxDate').val()
        let visits = $('#chart-6-visits').val()
        let confcases = $('#chart-6-confcases').val()
        update_chart_6(minDate, maxDate, visits, confcases);
    });
    $('#filter-chart-7').click(function() {
        let myDate = $('#chart7-myDate').val()
        update_chart_7(myDate);
    });			
})