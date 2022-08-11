<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="../static_css/style-sidebar.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                Covid Not Found!
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                   Hello, <i><?php session_start(); echo $_SESSION["user_name"]; ?></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="user_menu">
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Messages</a></li>
                  <li><a class="dropdown-item" id="logout">Sign out</a></li>
                </ul>
            </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-md-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span class="ml-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            <span class="ml-2">Orders</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="ml-2">Products</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <span class="ml-2">Customers</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                            <span class="ml-2">Reports</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            <span class="ml-2">Integrations</span>
                          </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h1 class="h2">Dashboard</h1>
                <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>
                
                <!-- Card Widgets -->
                <div class="row my-4">
                    <div class="col-12 col-md-4 mb-4 mb-lg-0 col-lg-4">
                        <div class="card">
							<h5 class="card-header">Total Visits</h5>
                            <div class="card-body">
                            	<div class="chart-containe d-flex align-items-center justify-content-center">
                                	<h1 id="chart-1"></h1>                                	
                              	</div>
								
								<div class="col-12 col-md-12 col-lg-12 d-flex align-items-end justify-content-end">
									<button id="refresh-chart-1">Refresh</button>
								</div>
							  								  
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-lg-0 col-lg-4">
                      	<div class="card">
                          	<h5 class="card-header">Confirmed Cases</h5>
						  
                          	<div class="card-body">
                        		<div class="chart-container">
									<h1 id="chart-2"></h1>
                            	</div>
								<div class="row">
									<div class="col-8 col-md-8 col-lg-8">
										<p class="card-text text">These are the total Confirmed Cases.</p>		
									</div>
									<div class="col-4 col-md-4 col-lg-4 d-flex align-items-end justify-content-end">
										<button id="refresh-chart-2">Refresh</button>
									</div>
							  	</div>                            
                          	</div>
                      	</div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-lg-0 col-lg-4">
                        <div class="card">
                            <h5 class="card-header">Total Visits of Confirmed Cases</h5>
                            <div class="card-body">
                              	<div class="chart-container">
                                	<h1 id="chart-3"></h1>
                              	</div>
								<div class="row">
									<div class="col-8 col-md-8 col-lg-8">
										<p class="card-text text">Total visitors found covid positive.</p>		
									</div>
									<div class="col-4 col-md-4 col-lg-4 d-flex align-items-end justify-content-end">
										<button id="refresh-chart-3">Refresh</button>
									</div>
							  	</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-6">
                    <div class="card">
                        <h5 class="card-header">POIs' Categories</h5>
                        <div class="card-body">
                          	<div class="chart-container pie-chart">
                            	<canvas id="chart-4"></canvas>
                          	</div>
							<div class="row">
								<div class="col-8 col-md-8 col-lg-8">
									<p class="card-text text">These are the POIs categorized.</p>		
								</div>
								<div class="col-4 col-md-4 col-lg-4 d-flex align-items-end justify-content-end">
									<button id="refresh-chart-4">Refresh</button>
								</div>
							</div>
                        </div>
                    </div>
                  </div>   
                  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-6">
                    <div class="card">
                        <h5 class="card-header">POIs' Categories</h5>
                        <div class="card-body">
                          	<div class="chart-container">
                            	<canvas id="chart-5"></canvas>
                        	</div>
							<div class="row">
								<div class="col-8 col-md-8 col-lg-8">
									<p class="card-text text">POIs categorized between 7-14 days.</p>		
								</div>
								<div class="col-4 col-md-4 col-lg-4 d-flex align-items-end justify-content-end">
									<button id="refresh-chart-5">Refresh</button>
								</div>
							</div>
                        </div>
                    </div>
                  </div>
                </div>
                
				<div class="col-12 col-md-12 mb-4 mb-lg-0 col-lg-12">
					<div class="card">
						<h5 class="card-header">Daily Diagram</h5>
						<div class="card-body">
						<div class="chartCard">
							<div class="chartBox">
								<canvas id="myChart"></canvas>
							</div>
							<div>
								Start: <input id="start" type="date" min="2022-01-01" max="2022-12-31"> 
								End: <input id="end" type="date" min="2022-01-01" max="2022-12-31">
								<button onclick="filterDate()">Filter</button><br>
							</div>
						</div>
						<div class="row">
							<div class="col-8 col-md-8 col-lg-8">
								<p class="card-text text">Visitors or Confirmed Cases per day.</p>		
							</div>
							<div class="col-4 col-md-4 col-lg-4 d-flex align-items-end justify-content-end">
								<button id="refresh-chart-6">Refresh</button>
							</div>
						</div>
						</div>
					</div>
				</div>
                
                
                <div class="col-12 col-md-12 mb-4 mb-lg-0 col-lg-12 my-4">
                    <div class="card">
                      <h5 class="card-header">Hourly Diagram</h5>
                      <div class="card-body">
                        <div class="chartCard">
                          <div class="chartBox">
                              <canvas id="myChart"></canvas>
							</div>
							<div>
                              Start: <input id="start" type="date" min="2022-01-01" max="2022-12-31"> 
                              End: <input id="end" type="date" min="2022-01-01" max="2022-12-31">
                              <button onclick="filterDate()">Filter</button><br>
                            
                          </div>
                          
                        </div>
						<div class="row">
							<div class="col-8 col-md-8 col-lg-8">
								<p class="card-text text">Visitors or Confirmed Cases per hour.</p>		
							</div>
							<div class="col-4 col-md-4 col-lg-4 d-flex align-items-end justify-content-end">
								<button id="refresh-chart-7">Refresh</button>
							</div>
						</div>
                      </div>
                    </div>
                </div>
            
				<?php include_once '../footer.php' ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	
	<script>
		window.onload = function() {
			// populate charts
			update_chart_1();
			update_chart_2();
			update_chart_3();
			update_chart_4();
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

		function update_chart_1() {
			$.ajax({
				url:"admincharts.inc.php",
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
				url:"admincharts.inc.php",
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
				url:"admincharts.inc.php",
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
				url:"admincharts.inc.php",
				method:"POST",
				data:{ chart4: null },
				dataType:"text",
				
				function( response ) {
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
				url:"admincharts.inc.php",
				method:"POST",
				data:{ chart5: null },
				dataType:"text",
				
				function( response ) {
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

		function create_pie_chart(chart_id, data) {
			var type = [];
			var visits = [];
			var color = [];

			for(var count = 0; count < data.length; count++) {
				type.push(data[count].type);
				visits.push(data[count].visits);
				color.push(data[count].color);
			}

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
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- Bar Chart Charts 6/7 -->
	<script defer type="text/javascript">

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

	</script>

	<!-- Pie Chart -->
	<script>

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
	</script>

	<script src="../login/logout.js"></script>

</body>
</html>
