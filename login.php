<?php

$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");

if(!$con){
	echo "No connection";
}

if(!empty($_POST['email']) && !empty($_POST['password'])){


	$email = $_POST['email'];

	$password = $_POST['password'];



$result = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");


if(mysqli_num_rows($result)> 0) {


		echo "success";
		session_start();

		$_SESSION['email'] = $email;
}else{
		echo "not found";

}
}else{
		echo "please enter parameters";

}






?>
