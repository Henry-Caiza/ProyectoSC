<?php

use Mpdf\Mpdf;
require_once('../vendor/autoload.php');
//plantilla
require_once('../pdf/Plantilla/carnet.php');
//codigo css plantilla
//$css=file_get_contents('ProyectoSC/pdf/Plantilla/stylecarnet.css');
$css = file_get_contents('../pdf/Plantilla/stylecarnet.css',true);
$mpdf= new \Mpdf\Mpdf([

]);
$a=getPlantilla();
$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($a,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->output();
?>
