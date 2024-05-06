<?php

define('DB_PASS', '6rC4]z4Z2Vg[3Z]U');
define('DB_NAME', 'productshop');

function get_connection()
{
    return new PDO(
        'mysql:host=localhost;dbname=' . DB_NAME . ';charset=utf8',
        DB_NAME,
        DB_PASS
    );
}

$menuItems = array();

$menuItems['menuItems'] = array(
    "Home" => "/gyakzh/index.php",
    "Products" => "/gyakzh/products.php",
);