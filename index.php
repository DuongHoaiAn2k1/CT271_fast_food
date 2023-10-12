<?php
session_start();
ob_start();
require "./helper/url.php";
require "./helper/data.php";
require "./models/database.php";


?>

<?php
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'main';

$path = "modules/{$mod}/{$act}.php";
if (file_exists($path)) {
    require $path;
} else {
    require "inc/404.php";
}

?>

<?php

?>
