<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=sigma_db;charset=utf8", "root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Connection error: " . $e->getMessage());
}
?>
