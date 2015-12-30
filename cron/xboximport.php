<?php

include "../app/classe.php";
$sql_client = mysql_query("SELECT * FROM client")or die(mysql_error());
while($client = mysql_fetch_array($sql_client)){
    var_dump($email = $clients['email']);
    var_dump($nom_client = $clients['nom_client']);
    var_dump($prenom_client = $clients['prenom_client']);
    var_dump($pseudo_psn = $clients['pseudo_psn']);
    var_dump($pass_psn = $clients['pass_psn']);
    var_dump($pseudo_xbox = $clients['pseudo_xbox']);
    var_dump($pseudo_steam = $clients['pseudo_steam']);
    var_dump($point = $clients['point']);
}
