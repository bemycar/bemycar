<?php

include("mpdf60/". "mpdf.php");

$carword = $_GET['carword'];


$con = mysqli_connect("localhost", "bemycar", "bemycar1", "bemycar");


$result = mysqli_query($con, "SELECT * FROM `vehicles`  WHERE `carword` = '$carword' ");


if(mysqli_num_rows($result) > 0) {



$carword = strtoupper($carword);
 $html='<style>@page {
     margin-top: 2.5cm;
    }</style>


    ';

$html .= "<div style = 'text-align:center; margin-top:;' > 
 <img style = ' margin-top:120px; margin-left:200px;' width=100% src='img/bemycartext2.png'></img>
<h1 style ='margin-top:180px; line-height: 10px; font-size:140vw;  text-align:center';> ".$carword."</h1></div> ";



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