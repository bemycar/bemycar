<?php


$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");



if(!empty($_POST['recipient_email']) && !empty($_POST['message']) && !empty($_POST['email'])){

	$recipient_email = $_POST['recipient_email'];
	$message = $_POST['message'];
	$from = $_POST['email'];

	if(mail($recipient_email, "Message from bemycar ", $message. "  FROM ".$from)){

		echo "sent";
	} else {
		echo "problem";
	}

} else {
	echo "missing params";
}

?>