<?php
session_start();

$root_path = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$root_path = str_replace('index.php', '', $root_path);

define('ROOT', $root_path);
define('ASSETS', $root_path . 'assets/');
define('THEME', 'eshop');

include '../app/init.php';
$app = new App();
