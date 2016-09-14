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
	}

}else{
	header('Location: index.php');
}


include 'header.php';


?>


<html>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKr4ft2bq82Nt5H4Cx2KJUXKkc1rpPbcw"></script>


<body>

	<div style = "text-align:center;">

<b> Call <?= $name; ?> on  <?= $number; ?> to see this vehicle ! </b>

<?php
		echo $make . " <BR>". $model." <BR>". $price. "  <BR>" . $description;



		if(!empty($image_1)){
			//echo "<img height =  ' 200px' src ='images/".$user_id ."/".$image_1."' </img>";
			echo	'<a  id="single_image" href="images/'.$user_id .'/'.$image_1.'"><img class = "featured_image" src="images/'.$user_id .'/'.$image_1.'" alt=""/></a>';

			echo	'<a  id="single_image" href="images/'.$user_id .'/'.$image_1.'"><img class = "images" src="images/'.$user_id .'/'.$image_1.'" alt=""/></a>';

		}
		if(!empty($image_2)){
			//echo "<img height =  ' 200px' src ='images/".$user_id ."/".$image_2."' </img>";
			echo	'<a  id="single_image" href="images/'.$user_id .'/'.$image_2.'"><img  class = "images" src="images/'.$user_id .'/'.$image_2.'" alt=""/></a>';

		}
		if(!empty($image_3)){
			//echo "<img height =  ' 200px' src ='images/".$user_id ."/".$image_3."' </img>";
					echo	'<a id="single_image" href="images/'.$user_id .'/'.$image_3.'"><img  class = "images" src="images/'.$user_id .'/'.$image_3.'" alt=""/></a>';

		}
		if(!empty($image_4)){
			//echo "<img height =  ' 200px' src ='images/".$user_id ."/".$image_4."' </img>";
			echo	'<a  id="single_image" href="images/'.$user_id .'/'.$image_4.'"><img  class = "images" src="images/'.$user_id .'/'.$image_4.'" alt=""/></a>';

		}



?>

	<textarea> Send a message to the owner..</textarea>
	<a href ='mail_user.php?user_id=<?= $user_id; ?>&message=hello&from=emailaddress'><button type ='button'>Email User </button> </a>

      <div style =" height:400px;
          width:400px;
          display:block;" id="map"></div>


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

<script>
//
// $(document).ready(function() {
//
// 	/* This is basic - uses default settings */
//
// 	$("a#single_image").fancybox();
//
// 	/* Using custom settings */
//
// 	$("a#inline").fancybox({
// 		'hideOnContentClick': true
// 	});
//
// 	/* Apply fancybox to multiple items */
//
// 	$("a.group").fancybox({
// 		'transitionIn'	:	'elastic',
// 		'transitionOut'	:	'elastic',
// 		'speedIn'		:	600,
// 		'speedOut'		:	200,
// 		'overlayShow'	:	false
// 	});
//
// });


</script>
