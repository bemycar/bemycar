<?php

$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");

$json_response = array();

if(!empty($_POST['email']) && !empty($_POST['password']) ){

	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = 0;
	$name = "";

	if(!empty($_POST['number'])){
		$number = $_POST['number'];
	}
	if(!empty($_POST['signup_name'])){
		$name = $_POST['signup_name'];
	}

	$result = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email' ");


	if (mysqli_num_rows($result) > 0) {

		$json_response['result'] = "exists";
	}else{
		$result2 = mysqli_query($con, "INSERT INTO `users` (`email`, `password`, `phone_number`, `name`)
		 VALUES ('$email', '$password', '$number', '$name') ");
		if($result2){
			$oldmask = umask(0);
			mkdir("images/".mysqli_insert_id($con), 0777);
			umask($oldmask);
			session_start();

			$_SESSION['email'] = $email;
			$json_response['result'] = "added";
		}else{
			$json_response['result'] = mysqli_error($con);
		}
	}
}else{
	$json_response['result'] = "please enter parameters";

}

echo json_encode($json_response);




?>