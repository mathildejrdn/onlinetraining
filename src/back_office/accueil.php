<?php
session_start();
include("../connect.php");
if(!$_SESSION['email']){
header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les admines</title>
    <meta charset="utf-8">

</head>
<body>

   <?php 
   $recupUser = $db->query("SELECT * FROM administrateurs");

   //AFFICHER UN BOUCLE POUR MONTRER LES ADMIN
   while($administrateur = $recupUser->fetch()){
    ?>
    <a href="message.php?id=<?php echo $administrateur['id']?>">
        <p><?php echo $administrateur["last_name"]; ?>
        <?php echo $administrateur["first_name"]; ?></p>
        
    </a>
    <?php
   }
   ?>
</body>
</html>