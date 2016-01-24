<?php
use App\api\phpwkhtmltopdf\Pdf;

require ('../../app/classe.php');

ob_start();
require "facture_wrap.php";
$content = ob_get_clean();

$pdf = new Pdf(array(

    'disable-smart-shrinking',
    'user-style-sheet' => 'pdf.css',
));
$pdf->addPage($content);
$pdf->send();