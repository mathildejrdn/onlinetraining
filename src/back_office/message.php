<?php
session_start();
include("../connect.php");
if(!$_SESSION['email']){
header("Location: connexion.php");
}
if(isset($_GET['id']) AND !empty($_GET['id'])){
// Si il y a un id admin on execute le code si no echo
    $getid = $_GET['id'];
    $recupUser = $db->prepare("SELECT * FROM administrateurs WHERE id = ?");
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){
        if(isset($_POST['envoyer'])){
           $id_to = $_GET["id"];
            $message = nl2br(htmlspecialchars($_POST["message"]));
            //Définir la date du message
            $date_message = date("Y-m-d H:i:s");

             //insérer le message
            $insererMessage = $db->prepare('INSERT INTO message(id_from,id_to,message,date_message,`read`)VALUES(?,?,?,?,?)');
            $insererMessage->execute(array($_SESSION["id"], $id_to, $message, $date_message,0));
        }
    }else{
        echo "Aucun admin trouvé";
    }

    
}else{
    echo "Aucun id trouvé";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message privé</title>
    <meta charset="utf-8">
</head>
<body>
    <form action="" method="POST">
      <textarea name="message" id=""></textarea>
      <br>  <br>
      <input type="submit" name="envoyer">
    </form>

    <section id="message">
<?php


//J'affiche tout les message (les conversations)
//Afficher les message recu  OR id_from = ? AND id_to = ?CE CODE QUI RECUPER 
    $recupMessage = $db->prepare('SELECT * FROM message WHERE id_from = ? AND id_to = ? OR id_from = ? AND id_to = ?');
    $recupMessage->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id']));
    while($message = $recupMessage->fetch()){
       if($message['id_to'] == $_SESSION['id']){
        ?> 
    <p style='color:red;'><?= $message['message']; ?>
    <p><?= $message['date_message']; ?>
    
</p>

        <?php
       }elseif ($message['id_to'] == $getid) {

       ?> 
    <p style='color:green;'><?= $message['message']; ?></p>

        <?php
    }
}
    ?>
    </section>
</body>
</html>