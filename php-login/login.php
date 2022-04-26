<?php

session_start();
require 'baseD.php';

if (!empty($_POST['email']) && !empty($_POST['contrasena'])){
   $records = $conn->prepare('SELECT id. email, contrasena FROM registros_gym WHERE email=:email');
   $records->bindParam(':email', $_POST['email']);
   $records->execute();
   $results = $records-> fetch(PDO::FETCH_ASSOC);

   $message = '';

   if (count($results) > 0 && password_verify($_POST['contraena'], $results['contrasena'])){
       $_SESSION['user_id'] = $results['id'];
       header('Locationn: /php-login');


   }else{
       $message = 'Las credenciales no coinciden';

   }
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap">
        <link rel="stylesheet" href="assets/css/style.css"> 
    </head>
    <body>

    <?php require 'partials/header.php'?>

    <h1>Login</h1>

     <?php if (!empty($message)) : ?>
     <p><?= $message ?></p>
     <?php endif;?>


        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Igrese su email">
            <input type="password" name="password" placeholder="Igrese su contrasena">
            <input type="submit" value="Send" >

        </form>

    </body>

</htmal>