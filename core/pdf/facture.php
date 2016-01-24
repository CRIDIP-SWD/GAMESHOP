<?php
use mikehaertl\wkhtmlto\Pdf;
require ('../../app/classe.php');

ob_start();
require "facture_wrap.php";
$content = ob_get_clean();

$pdf = new Pdf($content);
$pdf->send();