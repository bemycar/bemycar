<?php

include 'header.php';?>

<div class="o-page-wrapper large-form">

<div class="o-layout-container"><?php


$result = mysqli_query($con, "SELECT * FROM `users`  WHERE `email` = '$email' ");

$row = mysqli_fetch_array($result);

if(!empty($_POST['make'])){
	$make = $_POST['make'];
}


$allowed = array('png', 'jpg', 'gif');


if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';

	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'images/'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';



	}
}
?>

<form id="upload"  method="POST" enctype="multipart/form-data">
	<label>Add new car</label>
	<input type ="text"  name="make"  id="make" placeholder="make">
	<input type ="text" name="model" id="model" placeholder="model">
	<input type ="text" name="year" id="year" placeholder="year">
	<input type ="text" name="mileage" id="mileage" placeholder="mileage">
	<input type ="text" name="description" id="description" placeholder="description">
	<input type ="text" name="price" id="price" placeholder="price">
	<input type ="text" name="mot" id="mot" placeholder="mot">
	<input type ="text" name="tax" id="tax" placeholder="tax">
	<input type ="text" name="postcode" id="postcode" placeholder="postcode">

<div class="upload-images">
	<label>Upload Images</label>
		<input type="file" id="image_1" name="image1"  />
		<input type="file" id="image_2" name="image2"  />
		<input type="file" id="image_3" name="image3"  />
		<input type="file" id="image_4" name="image4"  />
	</div>
</form>
	<button class="c-btn" id="add" type="button" > Add </button>


	<img id="loading" style ="display:none" src ="loading.gif"</img>

<script>

$('#add').on("click", function() {


	$('#loading').show();


  var form = $('#upload')[0];
  console.log(form);
var formData = new FormData(form);
 console.log(formData);

   formData.append('image_1', $('#image_1')[0].files[0]);
   formData.append('image_2', $('#image_2')[0].files[0]);
   formData.append('image_3', $('#image_3')[0].files[0]);
   formData.append('image_4', $('#image_4')[0].files[0]);


    console.log(formData);

    $.ajax( {
      url: 'insert_vehicle.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
       success : function(data){

        if(data =="inserted"){
            console.log(data);

            window.location.href = 'my_account.php';
        }
    }
    } );
} );

</script>
</div>
</div>
