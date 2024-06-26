<?php
session_start();
if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");

    // var_dump($_GET['first_name']);
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM administrateurs WHERE id = :id";
    $query =$db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $admin = $query->fetch();

    if(!$admin){
        header("Location: ../index.php");
        exit;

    } else{
        $sql = "INSERT INTO `users` (`first_name`, `last_name`,`password`, `birth_date`, `adress`, `phone_number`, `email`, `genre`) VALUE (:first_name, :last_name, :password, :birth_date, :adress, :phone_number, :email, :genre)";

        $query = $db->prepare($sql);
        $query->bindValue(":first_name", $admin["first_name"]);
        $query->bindValue(":last_name", $admin["last_name"]);
        $query->bindValue(":birth_date", $admin["birth_date"], PDO::PARAM_STR);
        $query->bindValue(":adress", $admin["adress"]);
        $query->bindValue(":password",$admin["password"], PDO::PARAM_STR);
        $query->bindValue(":phone_number", $admin["phone_number"], PDO::PARAM_INT);
        $query->bindValue(":email", $admin["email"]);
        $query->bindValue(":genre", $admin["genre"]);
        
        $query->execute();
        
        // Supprimer l'administrateur de la table
        $sql= "DELETE FROM administrateurs WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        
        
        header("Location: adminList.php");
        
    }
    
} else {
        die("Erreur lors de la bascule. Veuillez réessayer.");
}
