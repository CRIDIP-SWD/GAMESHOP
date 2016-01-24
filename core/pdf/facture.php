<?php
use App\api\phpwkhtmltopdf\Pdf;

require ('../../app/classe.php');

ob_start();
require "facture_wrap.php";
$content = ob_get_clean();

$pdf = new Pdf(array(
    'no-outline',         // Make Chrome not complain
    'margin-top'    => 0,
    'margin-right'  => 0,
    'margin-bottom' => 0,
    'margin-left'   => 0,

    // Default page options
    'disable-smart-shrinking',
    'user-style-sheet' => 'pdf.css',
));
$pdf->addPage('facture_wrap.php');
$pdf->send();