<?php
session_start();
include("../connect.php");

if(!$_SESSION['email']){
header("Location: connexion.php");

}
$myId = $_SESSION['id'];
$newMessagesCount = 0;  // Initialiser la variable
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
   $recupUser = $db->prepare("SELECT * FROM administrateurs WHERE id != :myId");
   $recupUser->bindValue(':myId', $myId, PDO::PARAM_INT);
   $recupUser->execute();
   //AFFICHER UN BOUCLE POUR MONTRER LES ADMIN
   while($administrateur = $recupUser->fetch()){
    //Dans le balise a on ajoute le partie de php pour specifier l'identifiant de chaque admine
    ?>
    
     <?php
    if ($newMessagesCount > 0) {
        // Compter les messages non lus
        $countNewMessages = $db->prepare("SELECT COUNT(*) as new_messages FROM message WHERE id_to = ? AND `read` = 0");
        $countNewMessages->execute(array($_SESSION['id']));
        $newMessagesResult = $countNewMessages->fetch();
        $newMessagesCount = $newMessagesResult['new_messages'];
    }
    ?>
       <a href=""><?php echo "Vous avez $newMessagesCount nouveau(x) message(s) non lu(s)." ?></a> ;
    
    <a href="message.php?id=<?php echo $administrateur['id']?>">
        <p><?php echo $administrateur["last_name"]; ?>
        <?php echo $administrateur["first_name"]; ?></p>
       
    </a>
    
    <?php
   }
   ?>
</body>
</html>