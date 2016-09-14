 <?php

session_start();

if($_SESSION['logged'] == false){
    header('Location: index.php');
}

$con = mysqli_connect("localhost", "meeb", "meeb1", "ldnm");

 ?>

 <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>LDNM</title>

    


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>


  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/side-menu.css">
    <!--<![endif]-->
  



</head>
<body>






<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#">LDNM</a>

            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="home.php" class="pure-menu-link">Home</a></li>
                <li class="pure-menu-item"><a href="users.php" class="pure-menu-link">Users</a></li>

                <li class="pure-menu-item" class="menu-item-divided pure-menu-selected">
                    <a href="push.php" class="pure-menu-link">Push messages</a>
                </li>

                <li class="pure-menu-item"><a href="reports.php" class="pure-menu-link">Reports</a></li>
                <li class="pure-menu-item"><a href="offers.php" class="pure-menu-link">Offers</a></li>

            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>OFFERS</h1>
            <h2>Powered by Puzzle</h2>
        </div>
<div>
<?php
if(!empty($_POST['name']) &&  !empty($_POST['description']) && !empty($_POST['price']) && !empty($_POST['image']) ){



    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];


    $result = mysqli_query($con, "INSERT INTO `offers` (`name`, `description`, `price`, `image`, `active`) VALUES ('$name', '$description', '$price', '$image', 'yes')");
    if($result){
        echo "Offer Added";
    }

    

}


?>

<div style ="width:70%; margin:auto;">


<form action = "offers.php" method="POST" class="pure-form">
    <fieldset>
    
        <input type="text" name = "name" placeholder="name">

        <input type="text" name = "description" placeholder="description">
        <input type="text" name = "price" placeholder="price">
        <input type="text" name = "image" placeholder="image link">

        <button type="submit" class="pure-button pure-button-primary">Add Offer</button>
    </fieldset>
</form>
  


    <table class="pure-table">
    <thead style="background-color:#1f8dd6">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Active</th>

            <th></th>

        </tr>
    </thead>

    <tbody>
        <?php
        $offers = mysqli_query($con, "SELECT * FROM `offers` ");

        while($row = mysqli_fetch_array($offers)){



            echo "<tr class='pure-table-odd'>";

            echo "<td>". $row['name'] . "</td>";
            echo "<td>". $row['description'] . "</td>";
            echo "<td>". $row['price'] . "</td>";


            echo "<td> <img width='200px' src ='". $row['image'] . "'></img></td>";



            echo "<td>". $row['active'] . "</td>";

            echo "<td> <img class='delete' width='20px' height='20px' src ='cross.png'  alt='".$row['id']."''></img> </td>";
            echo "<tr>";
        }

        ?>
        
          


    </tbody>
</table>

</div>

  

</div>

       
</div>

<script>


$( ".delete" ).on('click', function(){
    if(window.confirm("Are you sure you want to delete id "+$(this).attr( "alt")+" ?")){

  var id =  "id="+ $(this).attr( "alt");
  console.log(id);

  $.ajax({
    url: 'delete_offer.php',
    data: id,
    type: 'POST',
    success : function(data){

        if(data =="success"){
            console.log(data);

            location.reload();
        }

    }
  });

}
});



</script>




<script src="js/ui.js"></script>


</body>
</html>
