<?php


$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");



if(!empty($_GET['user_id']) && !empty($_GET['message']) && !empty($_GET['from'])){


	$user_id = $_GET['user_id'];

	$message = $_GET['message'];
	$from = $_GET['from'];


$result = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '$user_id' ");

$row = mysqli_fetch_array($result);


$email = $row['email'];

if(mail($email, "Message from bemycar ", $message. "  FROM ".$from)){

	echo "sent";
}

}

?>