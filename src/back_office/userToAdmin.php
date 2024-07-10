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

if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");

    // var_dump($_GET['first_name']);
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM users WHERE id = :id";
    $query =$db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();

    if(!$user){
        header("Location: ../index.php");
        exit;

    } else {
        $sql = "INSERT INTO `administrateurs` (`first_name`, `last_name`,`password`, `birth_date`, `adress`, `phone_number`, `email`, `genre`, `role`) VALUE (:first_name, :last_name, :password, :birth_date, :adress, :phone_number, :email, :genre, :role)";

        $query = $db->prepare($sql);
        $query->bindValue(":first_name",  $user["first_name"]);
        $query->bindValue(":last_name",  $user["last_name"]);
        $query->bindValue(":birth_date",  $user["birth_date"], PDO::PARAM_STR);
        $query->bindValue(":adress",  $user["adress"]);
        $query->bindValue(":password", $user["password"], PDO::PARAM_STR);
        $query->bindValue(":phone_number",  $user["phone_number"], PDO::PARAM_INT);
        $query->bindValue(":email",  $user["email"]);
        $query->bindValue(":genre",  $user["genre"]);
        $query->bindValue(":role",  $user["role"]);
        
        $query->execute();
     

        // Supprimer l'utilisateur de la table users
        $sql = "DELETE FROM users WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        
        
        header("Location: userlist.php");
        
    }
    
} else {
        die("Erreur lors de la bascule. Veuillez réessayer.");
}