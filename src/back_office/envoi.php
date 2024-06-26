<?php
session_start();
    include '../connect.php' ;

   if(isset($_POST['envoi_message'])) {
    if(isset($_POST['destinataire'],$_POST['message'])) {

    }else {
        $error = "Veuillez completer tous les champs";
    }
   }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="POST">
     <label for="">Destinataire</label>
    <select name="destinataire">
<option>Boucle</option>
    </select>
    <br />
    <textarea placeholder="Votre message"   name="" id=""></textarea>
    <br />   <br /> 
    <input type="submit" value="Envoyer" name="envoi_message"/>
    <br />   <br /> 
    <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
    </form>
</body>
</html>