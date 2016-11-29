<?php

include 'header.php'; ?>

<div class="o-page-wrapper">
	<div class="o-layout-container">
		<a href ='add_vehicle.php'><button class="c-btn" type='button'>Add Vehicle</button></a>
		<a href ='logout.php'><button class="c-btn c-btn--logout" type='button'>LOG OUT</button></a>

<?php $result = mysqli_query($con, "SELECT * FROM `vehicles` JOIN `users` ON `vehicles`.`user_id` = `users`.`id` WHERE `email` = '$email' ");


if(mysqli_num_rows($result)> 0) {
		echo "<ul='c-car'>";

		while($row = mysqli_fetch_array($result)){
			echo "<li class='c-car__single'>";
			echo "<img height = '100px'src ='images/".$row['user_id']."/".$row['image_1']."' </img>";

			echo "<a href ='print_carword.php?carword=".$row['carword']."'><button type ='button'>Print Carword </button> </a>";

			echo $row['make']." ".$row['model'];

			echo "<img src ='cross.png' onclick='deleteVehicle(".$row['vehicle_id'].");' id = 'delete'></img>";
			echo "</li>";
		}
 	echo "</ul>";
}
?>

	<script>
	function deleteVehicle(rowId){


		$.ajax({
		    url: 'delete_vehicle.php',
		    data: "vehicle_id="+rowId,
		    type: 'POST',

		    success : function(data){

		        var response = JSON.parse(data);
		        console.log(response);
		        if(response.result == "success"){
		        	location.reload();
		        }else{
		        	alert("error");
		        }
		    }
		  });
		}
	</script>

	</div>
</div>
