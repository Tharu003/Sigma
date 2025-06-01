<?php
$host = 'localhost';
$db = 'sigma_db'; // your database name
$user = 'root'; // default user in XAMPP
$pass = ''; // default password in XAMPP is empty
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $bdd = new PDO($dsn, $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}
?>
