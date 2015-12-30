<?php

include "../app/classe.php";
$sql_client = mysql_query("SELECT * FROM client")or die(mysql_error());
while($client = mysql_fetch_array($sql_client)){
    var_dump($email = $client['email']);
    var_dump($nom_client = $client['nom_client']);
    var_dump($prenom_client = $client['prenom_client']);
    var_dump($pseudo_psn = $client['pseudo_psn']);
    var_dump($pass_psn = $client['pass_psn']);
    var_dump($pseudo_xbox = $client['pseudo_xbox']);
    var_dump($pseudo_steam = $client['pseudo_steam']);
    var_dump($point = $client['point']);
}
