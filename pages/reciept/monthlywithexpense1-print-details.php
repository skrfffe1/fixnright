<?php
include('config.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
ob_start();
require('monthlywithexpense1-details.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream('monthlywithexpense1-print-details.php',['Attachment'=>false]);









 ?>