<?php
session_start();

require 'baseD.php';

if (isset($_SESSION['user_id'])){
    $records = $conn->prepare('SELECT id, email, contrasena FROM registros_gym WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $records = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;

    if(count($results) > 0 ){
           $user = $results;
    }

}
?>


<html>
    <head>
        <meta charset="utf-8">
        <title>Bienvenidos al login</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <?php require 'partials/header.php'?>

        <?php if(!empty($user)):    ?>
            <br>Welcome. <?= $user['email'] ?>
            <br>Ingreso Correcto
            <a href="logout.php">Logaout</a>
            <?php else: ?>


        <h1> FAVOR DE INGRESAR </h>
           
        <a href="login.php">LOGIN</a> or 
        <a href="signup.php">REGISTRO</a>
        <?php endif;     ?>


                      

    </body>
  



</html>
