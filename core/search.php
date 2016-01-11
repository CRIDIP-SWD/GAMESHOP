<?php
if(isset($_GET['action']) && $_GET['action'] == 'search')
{
    include "../app/classe.php";
    $q = $_GET['q'];

    var_dump($_GET);
}