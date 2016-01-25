<?php
ini_set("display_errors", 1);
include "../app/classe.php";
$date_jour = strtotime(date("d-m-Y"));

$sql_vourcher = $DB->query("SELECT * FROM shop_vourcher WHERE perempsion >= :date_jour", array(
    "date_jour" => $date_jour
));
foreach($sql_vourcher as $vourcher){
    $idvourcher = $vourcher->idvourcher;
    $DB->execute("DELETE FROM shop_vourcher WHERE idvourcher = :idvourcher", array(
        "idvourcher"    => $idvourcher
    ));
}