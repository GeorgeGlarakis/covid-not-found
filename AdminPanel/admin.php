<?php include_once 'admin_header.php' ?>

	<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4" id="main_content">
				<h1 class="h2">Dashboard</h1>
                <p>This is the homepage of a simple admin interface which is part of a tutorial written on Themesberg</p>
                
                <!-- Card Widgets -->
                <div class="row my-4">
                    <div class="col-12 col-md-4 mb-4 mb-lg-0 col-lg-4">
                        <div class="card">
							<h5 class="card-header">Total Visits</h5>
                            <div class="card-body">
                            	<div class="d-flex align-items-center justify-content-center">
                                	<h1 id="chart-1"></h1>                                	
                              	</div>
								
								<div class="col-12 col-md-12 col-lg-4 d-flex align-items-center justify-content-center align-items-lg-end justify-content-lg-end">
									<button id="refresh-chart-1">Refresh</button>
								</div>
							  								  
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-lg-0 col-lg-4">
                      	<div class="card">
                          	<h5 class="card-header">Confirmed Cases</h5>
						  
                          	<div class="card-body">
							  <div class="d-flex align-items-center justify-content-center">
									<h1 id="chart-2"></h1>
                            	</div>
								<div class="row">
								<div class="col-12 col-md-12 col-lg-8 my-2">
										<p class="card-text text">These are the total Confirmed Cases.</p>		
									</div>
									<div class="col-12 col-md-12 col-lg-4 d-flex align-items-center justify-content-center align-items-lg-end justify-content-lg-end">
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
							<div class="d-flex align-items-center justify-content-center">
                                	<h1 id="chart-3"></h1>
                              	</div>
								<div class="row">
									<div class="col-12 col-md-12 col-lg-8 my-2">
										<p class="card-text text">Total visitors found covid positive.</p>		
									</div>
									<div class="col-12 col-md-12 col-lg-4 d-flex align-items-center justify-content-center align-items-lg-end justify-content-lg-end">
										<button id="refresh-chart-3">Refresh</button>
									</div>
							  	</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                  <div class="col-12 col-md-12 col-lg-6 mb-4 mb-lg-0">
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
                  <div class="col-12 col-md-12 col-lg-6 mb-4 mb-lg-0">
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
								<canvas id="chart-6"></canvas>
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

    <?php include '../requirements.php'; ?>

	<script>
		$(document).ready(function() {
			$('#dashboard').addClass("active");
		})
	</script>

	<script src="../static_javascript/statistics.js"></script>

</body>
</html>