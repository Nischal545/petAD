<?php
// config/config.php

$host = 'localhost';
$db = 'pet_management_system';
$user = 'root'; // Replace with your MySQL username
$pass = ''; // Replace with your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
