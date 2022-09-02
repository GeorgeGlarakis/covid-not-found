<?php include_once 'admin_header.php' ?>

	<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4" id="main_content">
				
				<h1 class="h2">POI Manipulation</h1>

				<div class="col-12 col-md-12 mb-4 mb-lg-0 col-lg-12 my-2">
					<div class="card">
						<h5 class="card-header">Insert POIs</h5>
						<div class="card-body">
						
							Upload a JSON file with POI info: 
							<input type="file" id="jsonfileinput" name="jsonfileinput" />
							<button id="save">Save</button>
						
						</div>
					</div>
				</div>

				<div class="col-12 col-md-12 mb-4 mb-lg-0 col-lg-12 my-2">
					<div class="card">
						<h5 class="card-header">DELETE ALL DATA</h5>
						<div class="card-body">
						
						<button id="delete">Delete ALL DATA</button>
						
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
		$(document).ready(function() {
			$('#pois').addClass("active");
		})
	</script>

	<script src="../static_javascript/poi_functions.js"></script>
	<script src="../static_javascript/logout.js"></script>

</body>
</html>

