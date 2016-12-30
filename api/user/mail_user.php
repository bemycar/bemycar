<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    $address = 'http://' . $_SERVER['SERVER_NAME'];
    if (strpos($_SERVER['HTTP_ORIGIN'], $address) !== 0) {

        exit(json_encode([
            'error' => 'Invalid Origin header: ' . $_SERVER['HTTP_ORIGIN']
        ]));
    }
} else {
    exit(json_encode(['error' => 'No Origin header']));
}

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