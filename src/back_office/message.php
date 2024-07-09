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

//On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);

}else{
    $currentPage = 1;
}
include("../connect.php");
//On determine le nombre total de message
$sql = 'SELECT COUNT(*) AS nb_message FROM message';
$query = $db->prepare($sql);
// On execute
$query->execute();

//Je recupere le nombre de message
$result = $query->fetch();

$nbMessage = (int) $result['nb_message'];
// On determine le nombre message par page
$parPage = 10;



//On calcule le nombre de message total  ceil ca veut dire 99/10 on aura 10 page si non les9 dernier il s'affiche pas

$pages = ceil($nbMessage / $parPage);



//Calcule du 1er message de la page
$premier = ($currentPage * $parPage) - $parPage;


$sql = 'SELECT * FROM message ORDER BY date_message DESC LIMIT :premier, :parpage;';

//On prepare la requete
$query = $db->prepare($sql);



$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);



//on execute
$query->execute();



if(!isset($_SESSION['email'])){
header("Location: connexion.php");

}
if(isset($_GET['id']) AND !empty($_GET['id'])){
// Si il y a un id admin on execute le code si no echo
    $getid = $_GET['id'];
    $recupUser = $db->prepare("SELECT * FROM administrateurs WHERE id = ?");
    $recupUser->execute(array($getid));

}if($recupUser->rowCount() > 0){
        


        if(isset($_POST['envoyer'])){
           $id_to = $_GET["id"];
           $message = nl2br(htmlspecialchars($_POST["message"]));
            //Définir la date du message
            $date_message = date("Y:m:d H:i:s");
            $filePath = '';
        }
// // Gestion des fichiers joints
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
    $fileName = basename($_FILES['attachment']['name']);
    $filePath = '../messages/uploads/' . $fileName;
    if (move_uploaded_file($_FILES['attachment']['tmp_name'], $filePath)) {
        // File a été télécharger
        // Affichez le lien de téléchargement
        
      
    } else {
        echo "Erreur de téléchargement.";
        exit;
    }
}



//insérer le message

if (!empty($message) || !empty($filePath)) {

    $insererMessage = $db->prepare('INSERT INTO message(id_from, id_to, message, date_message, `read`, `file`) VALUES (?, ?, ?, ?, ?, ?)');
    $insererMessage->execute(array($_SESSION["id"], $_GET['id'], $message, $date_message, 0, $filePath));

    echo "Message envoyé avec succès!";
           
            
    }else {
        $messageStatus = "Le champ message et le fichier joint sont vides.";
    }
}

?>
<!--  j'affiche le nom du destinataire en haut de la page -->
<?php
if($recupUser->rowCount() > 0){
        $user = $recupUser->fetch();
        $nom = htmlspecialchars($user['last_name']) . ' ' . htmlspecialchars($user['first_name']) . '<br>'; // Remplacez 'nom' par le nom de la colonne contenant le nom de l'utilisateur
    }
?>
<!-- Affiche le nom du destinataire en haut de la page -->
<h1>Bonjour, <?php echo $nom; ?></h1>
<nav>
    <ul class="pagination">
        <li class="page-item">
            <a href="" class="page-link">Précédente</a>
        </li>
        <li class="page-item">
            <a href="" class="page-link">1</a>
        </li>
        <li class="page-item">
            <a href="" class="page-link">2</a>
        </li>
        <li class="page-item">
            <a href="" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
<section id="message">
    <?php


//J'affiche tout les message (les conversations)
//Afficher les message recu  OR id_from = ? AND id_to = ?CE CODE QUI RECUPER 
    $recupMessage = $db->prepare('SELECT * FROM message JOIN administrateurs ON message.id_from = administrateurs.id
    WHERE id_from = ? AND id_to = ? OR id_from = ? AND id_to = ?');
    $recupMessage->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id']));
    while($message = $recupMessage->fetch()){
       if($message['id_to'] == $_SESSION['id'])
       {
        ?>
    <?php echo   htmlspecialchars($message['first_name']) . ' ' . htmlspecialchars($message['last_name']) . '<br>'; ?>
    <p style='color:red;'><?= $message['message']; ?>
    <p><?= $message['date_message']; ?></p>
    <?php 
   if(!empty( $message['file'])){
    ?>
    <a href="<?= $message['file'] ?>" download><img src="../images/pj.png" alt=""></a>
    <?php
    }

    
    
?>




    <?php
 
       }elseif ($message['id_to'] == $getid) {

       ?>
    <p style='color:green;'><?= $message['message']; ?></p>
    <p><?= $message['date_message']; ?></p>

    <?php 
   if(!empty( $message['file'])){
    ?>
    <a target="_blank" href="<?= $message['file'] ?>"><img src="../images/pj.png" alt=""></a>
    <?php
    }

    
    
?>
    <a href="">Supprimer</a>




    <?php
    }
}
    ?>
</section>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message privé</title>
    <meta charset="utf-8">
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="message">Message:</label>
        <textarea name="message" id=""></textarea>
        <br> <br>
        <label for="attachment">File:</label>
        <input type="file" name="attachment"><br>
        <input type="submit" name="envoyer">
    </form>


</body>

</html>