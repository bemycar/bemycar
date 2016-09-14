<?php

include("mpdf60/". "mpdf.php");


$carword = strtoupper($_GET['carword']);


$html = "<div style = 'text-align:center; padding-top:5mm;' > <img style = 'text-align:center;' src ='logo.png' width='155mm'  /> <BR>
<h1 style ='padding-top:1mm; font-size:140vw;  text-align:center';> ".$carword."</h1></div> ";



$mpdf=new mPDF('utf-8', 'A4-L');
$mpdf->showImageErrors = true;
$mpdf->WriteHTML($html);
$mpdf->debug = true;
$mpdf->Output();


exit;


?>