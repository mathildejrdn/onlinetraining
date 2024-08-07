<?php
session_start();

// Accés que pour les admins

function isAdmin() {
    if (isset($_SESSION['admin'])) {
        return true;
    }
    return false;
}

if (!isAdmin()) {
    header("Location: ../index.php");
    exit();
}

 include("../connect.php");


   
    
        //envoi_message c'est <input type="submit" value="Envoyer" name="envoi_message"/>
   if(isset($_POST['envoi_message'])) {
    if(isset($_POST['destinataire'], $_POST['message']) && !empty($_POST['destinataire']) && !empty($_POST['message'])) {
            //on securise les variable qui transite information
            $destinataire = htmlspecialchars($_POST['destinataire']);
            $message = nl2br(htmlspecialchars($_POST['message'])); 
            //récupérer l'ID du destinataire
            $id_destinataire = $db->prepare("SELECT id FROM administrateurs WHERE last_name = ?");
            $id_destinataire ->execute(array($destinataire));

            $id_destinataire = $id_destinataire->fetch();

        //    print_r($id_destinataire);

            $id_to = $id_destinataire["id"];
            print_r($id_destinataire);
            //Définir la date du message
            $date_message = date("Y-m-d H:i:s");


            //insérer le message
            $ins = $db->prepare("INSERT INTO message(id_from,id_to,message,date_message,`read`) VALUES (?,?,?,?,?)");
            $ins->execute(array($_SESSION["id"], $id_to, $message, $date_message,0));

            $error = "Votre message a bien ete envoye ! ";
            
        }else {
        $error = "Veuillez completer tous les champs";
    }
   }
   //Afficher les destinataire
   $destinataires = $db->query('SELECT last_name FROM administrateurs ORDER BY last_name');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta>
</head>

<body>

    <form action="" method="POST">
        <label for="">Destinataire</label>
        <select name="destinataire">
            <?php while ($d = $destinataires->fetch()) { ?>
            <option><?= $d['last_name'] ?></option>
            <?php } ?>
        </select>
        <br />
        <textarea placeholder="Votre message" name="message"></textarea>
        <br /> <br />
        <input type="submit" value="Envoyer" name="envoi_message" />
        <br /> <br />
        <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
    </form>
    <a href="inbox.php"> <button> Retour</button></a>
</body>

</html>
<?php
  //else {
    //header('Location:inbox.php');
    //exit();
 


 ?>