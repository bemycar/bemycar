<?php

if(!empty($_GET['carword'])){


$carword = $_GET['carword'];

$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");


$result = mysqli_query($con, "SELECT * FROM `vehicles` JOIN `users` ON `vehicles`.`user_id` = `users`.`id` WHERE `carword` = '$carword' ");


	if(mysqli_num_rows($result)> 0) {


		$row = mysqli_fetch_array($result);

		$user_id = $row['user_id'];

		$make = $row['make'];
		$model = $row['model'];
		$year = $row['year'];
		$mileage = $row['mileage'];
		$description = $row['description'];
		$price =  $row['price'];
		$mot =  $row['MOT'];
		$tax =  $row['tax'];
		$image_1 =  $row['image_1'];
		$image_2 =  $row['image_2'];
		$image_3 =  $row['image_3'];
		$image_4 =  $row['image_4'];
		$number =  $row['phone_number'];
		$name = $row['name'];
		$postcode = $row['postcode'];

		$update = mysqli_query($con, "UPDATE `vehicles` SET `page_views` = `page_views` + 1 WHERE `carword` = '$carword'");
	}

}else{
	header('Location: index.php');
}


include 'header.php';


?>
<link rel='stylesheet' href='assets/css/slick.css'>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKr4ft2bq82Nt5H4Cx2KJUXKkc1rpPbcw"></script>


<div class="o-page-wrapper">
	<div class="o-layout-container--slim">

		<div class="c-car-info">
			<!-- <p class="c-car-info__contact">Call <?php echo $name; ?> on <?php echo $number; ?> to see this vehicle!</p> -->
      <div class="c-car-info__details">
  			<p class="c-car-info__year"><?php echo $year; ?> - </p>
  			<p class="c-car-info__make"><?php echo $make; ?></p>
  			<p class="c-car-info__model"><?php echo $model; ?></p>
  			<p class="c-car-info__small-desc"><?php echo $description; ?></p>
      </div>
      <div class="c-car-info__price">
        <p>£ <?php echo $price; ?></p>
      </div>
    </div>


    <div class="c-image-gallery__wrapper">

  		<div class="c-image-gallery">
  			<?php if(!empty($image_1)){
  				echo '<div class="c-image-gallery__single"><img class="images" src="images/'.$user_id .'/'.$image_1.'" alt=""/></div>';
  			}
  			if(!empty($image_2)){
  				echo '<div class="c-image-gallery__single"><img class= "images" src="images/'.$user_id .'/'.$image_2.'" alt=""/></div>';
  			}
  			if(!empty($image_3)){
  				echo '<div class="c-image-gallery__single"><img class="images" src="images/'.$user_id .'/'.$image_3.'" alt=""/></div>';
  			}
  			if(!empty($image_4)){
  				echo '<div class="c-image-gallery__single"><img class="images" src="images/'.$user_id .'/'.$image_4.'" alt=""/></div>';
  			}?>

  		</div>

  		<div class="c-image-gallery-nav">
  			<?php if(!empty($image_1)){
  				echo '<div class="c-image-gallery-nav__single"><img class="images" src="images/'.$user_id .'/'.$image_1.'" alt=""/></div>';
  			}
  			if(!empty($image_2)){
  				echo '<div class="c-image-gallery-nav__single"><img class= "images" src="images/'.$user_id .'/'.$image_2.'" alt=""/></div>';
  			}
  			if(!empty($image_3)){
  				echo '<div class="c-image-gallery-nav__single"><img class="images" src="images/'.$user_id .'/'.$image_3.'" alt=""/></div>';
  			}
  			if(!empty($image_4)){
  				echo '<div class="c-image-gallery-nav__single"><img class="images" src="images/'.$user_id .'/'.$image_4.'" alt=""/></div>';
  			}?>
  		</div>
  	</div>

    <div class="c-car-info__more">
      <div class="o-span6">
        <p class="c-car-info__mot">MOT: <?php echo $mot; ?></p>
        <p class="c-car-info__tax">TAX: <?php echo $tax; ?></p>
        <p class="c-car-info__miles">MILES: <?php echo $mileage; ?></p>
      </div>
      <div class="c-car-info__contact o-span6">
      	<button class="c-btn c-btn--small c-btn--purple"><?php echo $mot; ?></button>
      	<!-- <a href ='mail_user.php?user_id=<?= $user_id; ?>&message=hello&from=emailaddress'> -->
					<button class="c-btn c-btn--small js-page-email js-popup" type='button'>Email User </button>
				<!-- </a> -->
      </div>
    </div>

    <!-- Description, will be replaced with db user description -->
    <div class="c-car-info__description">
      <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt.</p>
      <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Donec rutrum congue leo eget malesuada. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.<p>
    </div>

    <!-- Map -->
    <div id="map" class="c-map"></div>
  </div>
</div>

<script type="text/javascript">

function getPosition(callback) {
	// set up our geoCoder
	var geocoder = new google.maps.Geocoder();

	// get our postcode value
	var postcode = "<?= $postcode ?>";
	console.log(postcode);
	//send value to google to get a longitude and latitude value
	geocoder.geocode({'address': postcode+",UK"}, function(results, status)
	{
	  // callback with a status and result
	  if (status == google.maps.GeocoderStatus.OK)
	  {
	  		console.log("O K");

	    // send the values back in a JSON string
	    callback({
	      latt: results[0].geometry.location.lat(),
	      lng: results[0].geometry.location.lng()
	    });
	  }
	});
}
function setup_map(latitude, longitude) {
	// create a JSON object with the values to mark the position
	var _position = { lat: latitude, lng: longitude};

	// add our default mapOptions
	var mapOptions = {
	  zoom: 13,              // zoom level of the map
	  center: _position     // position to center
	}

	// load a map within the "map" div and display
	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	// add a marker to the map with the position of the longitude and latitude
	// var marker = new google.maps.Marker({
	//   position: mapOptions.center,
	//   map: map
	// });
}
window.onload = function() {

		   console.log("OK");

	// first setup the map, with our default location of London
	setup_map(51.5073509, -0.12775829999998223);

	  // when form is submitted, wait for a callback with the longitude and latitude values
	  getPosition(function(position){

	    // log the position returned
	   console.log("Marker position: { Longitude: "+position.lng+ ",  Latitude:"+position.latt+" }");

	    // update the map with the new position
	    setup_map(position.latt, position.lng);
	  });

}

</script>
<script src='assets/js/slick.min.js'></script>

<?php include 'footer.php'; ?>
