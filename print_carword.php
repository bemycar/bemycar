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
 <img style = ' margin-top:120px; margin-left:200px;' src='img/bemycartext.png'></img> 
<h1 style ='margin-top:230px; line-height: 10px; font-size:140vw;  text-align:center';> ".$carword."</h1></div> ";



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