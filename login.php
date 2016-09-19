<?php

$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");

$json_response = array();

if(!$con){
	$json_response['result'] =  "No connection";
	exit();
}

if(!empty($_POST['email']) && !empty($_POST['password'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	$result = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");


	if(mysqli_num_rows($result)> 0) {
		$json_response['result'] = "success";
		session_start();
		$_SESSION['email'] = $email;
	}else{
		$json_response['result'] = "not found";
	}

}else{
	$json_response['result'] = "please enter parameters";

}

echo json_encode($json_response);






?>
