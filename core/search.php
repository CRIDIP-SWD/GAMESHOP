<?php
if(isset($_GET['action']) && $_GET['action'] == 'searching')
{
    include "../app/classe.php";
    $q = $_GET['q'];

    var_dump($_GET);
}