<?php
if(isset($_GET['view']))
{
    switch($_GET['view'])
    {
        case 0:
            include "view/index.php";
    }
}