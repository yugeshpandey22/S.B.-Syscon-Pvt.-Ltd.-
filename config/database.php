<?php
// config/database.php

$host = '127.0.0.1';
$db_name = 'sbsyscon_new';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;port=3306;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Connection error: " . $e->getMessage();
    die(); // Stop execution if DB fails
}
?>