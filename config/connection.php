<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'lat_php_native';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    echo "error ".$e->getMessage();
    die();
}