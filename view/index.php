<?php

require "app/autoloader.php";
\App\autoloader::register();

use App\app;
use App\constante;

$app = new app();
$constante = new constante();
?>
<pre><?php var_dump($constante::getUrl(array("css", "stylesheet"), true)); ?></pre>
<?php
