<?php

include("mpdf60/". "mpdf.php");

$carword = $_GET['carword'];


$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");


$result = mysqli_query($con, "SELECT * FROM `vehicles`  WHERE `carword` = '$carword' ");


if(mysqli_num_rows($result) > 0) {

$carword = strtoupper($carword);


$html = "<div style = 'text-align:center; padding-top:5mm;' > 
 <h2 style = 'color:#46c496; font-size:100vw; font-family:FuturaStd-ExtraBold;'> BEMYCAR.CO.UK </h2> <BR>
<h1 style ='padding-top:10mm; font-size:140vw;  text-align:center';> ".$carword."</h1></div> ";



$mpdf=new mPDF('utf-8', 'A4-L');
$mpdf->showImageErrors = true;
$mpdf->WriteHTML($html);
$mpdf->debug = true;
$mpdf->Output();

exit;

} else {
	header('Location: index.php');
}


?>