<?php
session_start();
 include("../connect.php");
//on se connect a la base de donner en cliquant valider
if(isset($_POST['valider'])){
    if(!empty($_POST['email'])){
    
        //je recupere l'id d'admine
        $recupUser = $db->prepare("SELECT * FROM administrateurs WHERE email = ?");
        $recupUser->execute(array($_POST['email']));
// si on a trouver un utilisateur on continue
        if($recupUser->rowCount() > 0){

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: accueil.php');


        }else{
            echo"Aucun admine trouvé";
        }

    }else{
        echo"Veuillez rentrer votre mail";
    }
}

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
</head>

<body>
    <form method="POST" action="">
        <br> <br>
        <input type="email" name="email">
        <input type="password" name="pass">
        <input type="submit" name="valider">

    </form>
</body>

</html>