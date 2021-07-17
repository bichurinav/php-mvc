<?php

define('DB_DATA', array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => '1097',
    'database' => 'eshop',
    'type' => 'mysql'
));

define('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}
