<?php
session_start();
    include '../connect.php' ;


if(isset($_SESSION["id"]) AND !empty($_SESSION["id"])){
   if(isset($_POST['envoi_message'])) {
    if(
        isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])) {
            //on securise les variable qui transite information
            $destinataire = htmlspecialchars($_POST['destinataire']);
            $message = htmlspecialchars($_POST['message']); 

            $id_destinataire = $db->prepare("SELECT id FROM administrateurs WHERE last_name = ?");
            $id_destinataire ->execute(array($destinataire));
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire["id"];

            //inserer le message
            $ins = $db->prepare("INSERT INTO message(id_from,id_to,message,date_message,read) VALUES (?,?,?,?,?)");
            $ins->execute(array($_SESSION["id"], $id_to, $message, $date_message));

            $error = "Votre message a bien ete envoye ! "
            
    else {
        $error = "Veuillez completer tous les champs";
    }
   }

   


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
    <textarea placeholder="Votre message"   name="" id=""></textarea>
    <br />   <br /> 
    <input type="submit" value="Envoyer" name="envoi_message"/>
    <br />   <br /> 
    <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
    </form>
    </body>
    </html>
<?php
 }
 ?>