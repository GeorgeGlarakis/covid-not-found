<?php

	include "database_conn.php";

	header('Content-Type: text/plain');
	$test = utf8_encode($_POST['pois']);
	$data = json_decode($test);

	foreach($data as $tmp_poi) {

		
		insert_poi($tmp_poi, $conn);	

	}


	function insert_poi($tmp_poi, $conn) {
		$tmp_id = $tmp_poi->id;
		$tmp_name = $tmp_poi->name;
		$tmp_address = $tmp_poi->address;
		$tmp_types = $tmp_poi->types; // Array
		$tmp_populartimes = json_encode($tmp_poi->populartimes); 
		$tmp_rating = $tmp_poi->rating;
		$tmp_rating_n = $tmp_poi->rating_n;
		$tmp_coordinates = $tmp_poi->coordinates;
		$tmp_latitude = $tmp_coordinates->lat;
		$tmp_longitude = $tmp_coordinates->lng;

		$insert_poi = "INSERT INTO pois (poi_i, name, address, latitude, longitude, rating, rating_n, populartimes)
						VALUES ('$tmp_id','$tmp_name','$tmp_address','$tmp_latitude','$tmp_longitude','$tmp_rating','$tmp_rating_n','$tmp_populartimes');";

		$stmt = mysqli_stmt_init($conn);

		try {
			mysqli_stmt_prepare($stmt, $insert_poi);
		}
		catch (Exception $err){
			// header("location: ".$_SERVER["PHP_SELF"]."?error=false_sql_statement");

			header("location: index.php?error=stmt_failed", TRUE, 301);
			die;
		}
		mysqli_stmt_execute($stmt);
    	mysqli_stmt_close($stmt);

	}

	function update_poi($tmp_poi, $conn) {
		$tmp_id = $tmp_poi->id;
		$tmp_name = $tmp_poi->name;
		$tmp_address = $tmp_poi->address;
		$tmp_types = $tmp_poi->types; // Array
		$tmp_populartimes = json_encode($tmp_poi->populartimes); 
		$tmp_rating = $tmp_poi->rating;
		$tmp_rating_n = $tmp_poi->rating_n;
		$tmp_coordinates = $tmp_poi->coordinates;
		$tmp_latitude = $tmp_coordinates->lat;
		$tmp_longitude = $tmp_coordinates->lng;

		$insert_poi = "UPDATE pois 
						SET rating = '$tmp_rating', rating_n = '$tmp_rating_n', populartimes = '$tmp_populartimes'
						WHERE poi_id = '$tmp_id';";

		$stmt = mysqli_stmt_init($conn);

		try {
			mysqli_stmt_prepare($stmt, $insert_poi);
		}
		catch (Exception $err){
			// header("location: ".$_SERVER["PHP_SELF"]."?error=false_sql_statement");

			header("location: index.php?error=stmt_failed", TRUE, 301);
			die;
		}
		mysqli_stmt_execute($stmt);
    	mysqli_stmt_close($stmt);

	}

	function delete_all($conn) {
		$delete_all = "DELETE * FROM pois";

		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $delete_all);
		mysqli_stmt_execute($stmt);
    	mysqli_stmt_close($stmt);
	}

?>
