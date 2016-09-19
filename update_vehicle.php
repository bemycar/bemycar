<?php

session_start();
$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");

$json_response = array();

if(!empty($_SESSION['email'])){
	$email = $_SESSION['email'];
}else{
	$json_response['result'] = 'no log in';
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
$carword = "";

$sql = "UPDATE `vehicles` SET ";

if(!empty($_POST['make'])){
	$make = $_POST['make'];
	$sql .= "`make` = '".$make."' ";
}
if(!empty($_POST['model'])){
	$model = $_POST['model'];
	$sql .= "`model` = '".$model."' ";
}
if(!empty($_POST['year'])){
	$year = $_POST['year'];
	$sql .= "`year` = '".$year."' ";
}
if(!empty($_POST['mileage'])){
	$mileage = $_POST['mileage'];
	$sql .= "`mileage` = '".$mileage."' ";
}
if(!empty($_POST['description'])){
	$description = $_POST['description'];
	$sql .= "`description` = '".$description."' ";
}
if(!empty($_POST['price'])){
	$price = $_POST['price'];
	$sql .= "`price` = '".$price."' ";
}
if(!empty($_POST['mot'])){
	$mot = $_POST['mot'];
	$sql .= "`mot` = '".$mot."' ";
}
if(!empty($_POST['tax'])){
	$tax = $_POST['tax'];
	$sql .= "`tax` = '".$tax."' ";
}

if(!empty($_POST['postcode'])){
	$postcode = $_POST['postcode'];
	$postcode = str_replace(" ", "+", $postcode);
	$sql .= "`postcode` = '".$postcode."' ";
}

$allowed = array('png', 'jpg', 'gif','PNG', 'JPG', 'GIF', 'jpeg', 'JPEG');


if(isset($_FILES['image_1']) && $_FILES['image_1']['error'] == 0){


	$extension = pathinfo($_FILES['image_1']['name'], PATHINFO_EXTENSION);
	$image_1 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		$json_response['error'] = 'image_1 error';
		
	}

	if(move_uploaded_file($_FILES['image_1']['tmp_name'], 'images/'.$user_id.'/'.$image_1)){
		$sql .= "`image_1` = '".$image_1."' ";
	}
}

if(isset($_FILES['image_2']) && $_FILES['image_2']['error'] == 0){

	$extension = pathinfo($_FILES['image_2']['name'], PATHINFO_EXTENSION);
	$image_2 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		$json_response['error'] = 'image_2 error';
	}

	if(move_uploaded_file($_FILES['image_2']['tmp_name'], 'images/'.$user_id.'/'.$image_2)){
		$sql .= "`image_2` = '".$image_2."' ";
	}
}

if(isset($_FILES['image_3']) && $_FILES['image_3']['error'] == 0){

	$extension = pathinfo($_FILES['image_3']['name'], PATHINFO_EXTENSION);
	$image_3 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		$json_response['error'] = 'image_3 error';
	}

	if(move_uploaded_file($_FILES['image_3']['tmp_name'], 'images/'.$user_id.'/'.$image_3)){
		$sql .= "`image_3` = '".$image_3."' ";
	}
}

if(isset($_FILES['image_4']) && $_FILES['image_4']['error'] == 0){

	$extension = pathinfo($_FILES['image_4']['name'], PATHINFO_EXTENSION);
	$image_4 = time().".".$extension;

	if(!in_array(strtolower($extension), $allowed)){
		$json_response['error'] = 'image_3 error';
	}

	if(move_uploaded_file($_FILES['image_4']['tmp_name'], 'images/'.$user_id.'/'.$image_4)){
		$sql .= "`image_4` = '".$image_4."' ";
	}
}

if(!empty($_POST['carword'])){
	$carword = $_POST['carword'];
	$sql .= "WHERE `carword` = '".$carword."' ";

 	$insert = mysqli_query($con, $sql);


	if($insert){
 		$json_response['result'] = 'updated';

 	//mysqli_query($con, "DELETE FROM `carwords` WHERE `words` = '$carword'");
	 }else{
	 	$json_response['error'] = mysqli_error($con);
	 }


}else {
	$json_response['result'] = 'please send carword';
}


echo json_encode($json_response);




?>