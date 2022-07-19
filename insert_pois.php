<?php

	include "database_conn.php";

	header('Content-Type: text/plain');
	$file = utf8_encode($_POST['pois']);
	$data = json_decode($file);

	foreach($data as $tmp_poi) {
		insert_poi($tmp_poi, $conn);	
	}

	function insert_poi($tmp_poi, $conn) {
		$tmp_id = $tmp_poi->id;
		$tmp_name = $tmp_poi->name;
		$tmp_address = $tmp_poi->address;
		$tmp_populartimes = json_encode($tmp_poi->populartimes); 
		$tmp_rating = $tmp_poi->rating;
		$tmp_rating_n = $tmp_poi->rating_n;
		$tmp_coordinates = $tmp_poi->coordinates;
		$tmp_latitude = $tmp_coordinates->lat;
		$tmp_longitude = $tmp_coordinates->lng;

		$insert_poi = "INSERT INTO pois (poi_id, name, address, latitude, longitude, rating, rating_n, populartimes)
						VALUES ('$tmp_id','$tmp_name','$tmp_address','$tmp_latitude','$tmp_longitude','$tmp_rating','$tmp_rating_n','$tmp_populartimes');";

		try {
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $insert_poi);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			insert_types($tmp_poi, $conn);
		}
		catch (Exception $err) {
			// Handle the Duplicate entries and update the columns!
			if(strpos($err, 'Duplicate entry') == true){
				mysqli_stmt_close($stmt);
				update_poi($tmp_poi, $conn);
			} else{
				mysqli_stmt_close($stmt);
				echo "[SQL Failed]";
				die;
			}
		}    	

	}

	function insert_types($tmp_poi, $conn) {
		$tmp_id = $tmp_poi->id;
		$tmp_types = $tmp_poi->types;

		foreach($tmp_types as $type) {
			$select_type = "SELECT COUNT(*) FROM types WHERE name = '$type';";
			$insert_type = "INSERT INTO types (name) VALUES ('$type');";
			$insert_pois_type = "INSERT INTO pois_type (poi_id, type_id)
									SELECT '$tmp_id', type_id FROM types
										WHERE name = '$type';";
			
			try {
				$stmt = mysqli_stmt_init($conn);
			
				mysqli_stmt_prepare($stmt, $select_type);
				mysqli_stmt_execute($stmt);

				$resultData = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_assoc($resultData);
		
				IF ($row['COUNT(*)'] == 0){
					mysqli_stmt_prepare($stmt, $insert_type);
					mysqli_stmt_execute($stmt);
				}
				mysqli_stmt_prepare($stmt, $insert_pois_type);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
			}
			catch (Exception $err) {
				echo $err;
				die;
			} 				
		}
	}

	function update_poi($tmp_poi, $conn) {
		$tmp_id = $tmp_poi->id;
		$tmp_populartimes = json_encode($tmp_poi->populartimes); 
		$tmp_rating = $tmp_poi->rating;
		$tmp_rating_n = $tmp_poi->rating_n;

		$insert_poi = "UPDATE pois 
						SET rating = '$tmp_rating', rating_n = '$tmp_rating_n', populartimes = '$tmp_populartimes'
							WHERE poi_id = '$tmp_id';";

		try {
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $insert_poi);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		catch (Exception $err) {
			echo $err;
			die;
		} 	
	}

	function delete_all($conn) {
		$delete_all = "DELETE * FROM pois";

		try {
			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $delete_all);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		catch (Exception $err) {
			echo $err;
			die;
		}
	}

?>
