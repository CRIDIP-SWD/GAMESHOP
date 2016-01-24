<?php
require ('../../app/classe.php');
require ('../../vendor/mikehaertl/phpwkhtmltopdf/src/Command.php');
require ('../../vendor/mikehaertl/phpwkhtmltopdf/src/Image.php');
require ('../../vendor/mikehaertl/phpwkhtmltopdf/src/Pdf.php');
use \mikehaertl\wkhtmlto\Pdf;
use \mikehaertl\wkhtmlto\Command;
use \mikehaertl\wkhtmlto\Image;

$pdf = new Pdf(array(
    'no-outline',
    "margin-top"    => 0,
    "margin-right"  => 0,
    "margin-left"   => 0,
    "margin-bottom" => 0,

    'disable-smart-shrinking',
    "user-style-sheet" => 'pdf.css'

));
$pdf->addPage('facture_wrap.php');
$pdf->send();