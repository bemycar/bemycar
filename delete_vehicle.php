<?php

	session_start();
	$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");

	if(!empty($_SESSION['email'])){

	$email = $_SESSION['email'];

	if(!empty($_POST['vehicle_id'])){

		$vehicle_id = $_POST['vehicle_id'];

	}


	$result = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email' ");


	if(mysqli_num_rows($result) > 0){

		$row = mysqli_fetch_array($result);
		$user_id = $row['id'];
	}


	$delete_vehicle = mysqli_query($con, "DELETE FROM `vehicles` WHERE `user_id` = '$user_id' AND `vehicle_id` = '$vehicle_id'");

	if($delete_vehicle){
		echo "success";
	}


	echo mysqli_error($con);

}


?>