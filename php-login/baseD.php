<?php
$server = 'localhost';
$username = 'root';
$contrasena = '';
$database ='login_gym';


try {
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $contrasena);
} catch (PDOException $e) {
    die('Connected failed: '.$e->getMessage());
}

?>