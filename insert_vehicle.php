<?php



session_start();
$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");


if(!empty($_SESSION['email'])){

	$email = $_SESSION['email'];

}else{
echo "please log in";
}

$make = "";
$model = "";
$year = "";
$mileage = "";
$description = "";
$price = "";
$mot = "";
$tax = "";
$postcode = "";

$image_1 = "";
$image_2 = "";
$image_3 = "";
$image_4 = "";


$result = mysqli_query($con, "SELECT * FROM `users`  WHERE `email` = '$email' ");

$row = mysqli_fetch_array($result);

$user_id = $row['id'];



if(!empty($_POST['make'])){
	$make = $_POST['make'];
}
if(!empty($_POST['model'])){
	$model = $_POST['model'];
}
if(!empty($_POST['year'])){
	$year = $_POST['year'];
}
if(!empty($_POST['mileage'])){
	$mileage = $_POST['mileage'];
}
if(!empty($_POST['description'])){
	$description = $_POST['description'];
}
if(!empty($_POST['price'])){
	$price = $_POST['price'];
}
if(!empty($_POST['mot'])){
	$mot = $_POST['mot'];
}
if(!empty($_POST['tax'])){
	$tax = $_POST['tax'];
}

if(!empty($_POST['postcode'])){
	$postcode = $_POST['postcode'];
	$postcode = str_replace(" ", "+", $postcode);
	
}

$allowed = array('png', 'jpg', 'gif','PNG', 'JPG', 'GIF', 'jpeg', 'JPEG');


if(isset($_FILES['image_1']) && $_FILES['image_1']['error'] == 0){


	$extension = pathinfo($_FILES['image_1']['name'], PATHINFO_EXTENSION);
	$image_1 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		echo 'image_1 error';
		
	}

	if(move_uploaded_file($_FILES['image_1']['tmp_name'], 'images/'.$user_id.'/'.$image_1)){
		//echo 'image_1 uploaded';
		

	}
}

if(isset($_FILES['image_2']) && $_FILES['image_2']['error'] == 0){


	$extension = pathinfo($_FILES['image_2']['name'], PATHINFO_EXTENSION);
	$image_2 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		echo 'image_2 error';
		
	}

	if(move_uploaded_file($_FILES['image_2']['tmp_name'], 'images/'.$user_id.'/'.$image_2)){
		//echo 'image_2 uploaded';
		

	}
}

if(isset($_FILES['image_3']) && $_FILES['image_3']['error'] == 0){


	$extension = pathinfo($_FILES['image_3']['name'], PATHINFO_EXTENSION);
	$image_3 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		echo 'image_3 error';
		
	}

	if(move_uploaded_file($_FILES['image_3']['tmp_name'], 'images/'.$user_id.'/'.$image_3)){
		//echo 'image_3 uploaded';
		

	}
}

if(isset($_FILES['image_4']) && $_FILES['image_4']['error'] == 0){


	$extension = pathinfo($_FILES['image_4']['name'], PATHINFO_EXTENSION);

	$image_4 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		echo 'image_3 error';
		
	}

	if(move_uploaded_file($_FILES['image_4']['tmp_name'], 'images/'.$user_id.'/'.$image_4)){
		//echo 'image_4 uploaded';
		

	}
}

$carwords = 	mysqli_query($con, "SELECT * FROM `car_words` ORDER BY RAND() LIMIT 1");

$row = mysqli_fetch_array($carwords);

$carword = $row['word'];

 $insert = mysqli_query($con, "INSERT INTO `vehicles` (`user_id`, `carword`, `make`, `model`, `year`, `mileage`, `description`, `image_1`,
 	`image_2`, `image_3`, `image_4`, `price`, `MOT`, `tax`, `postcode`) VALUES ('$user_id', '$carword', '$make', '$model', '$year', '$mileage',
 	'$description', '$image_1', '$image_2', '$image_3', '$image_4', '$price', '$mot', '$tax', '$postcode') ");


if($insert){
 	echo "inserted";
 	//mysqli_query($con, "DELETE FROM `carwords` WHERE `words` = '$carword'");
 }else{
 	echo mysqli_error($con);
 }





?>