<?php
session_start();
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
        $sql = "INSERT INTO `administrateurs` (`first_name`, `last_name`,`password`, `birth_date`, `adress`, `phone_number`, `email`, `genre`) VALUE (:first_name, :last_name, :password, :birth_date, :adress, :phone_number, :email, :genre)";

        $query = $db->prepare($sql);
        $query->bindValue(":first_name",  $user["first_name"]);
        $query->bindValue(":last_name",  $user["last_name"]);
        $query->bindValue(":birth_date",  $user["birth_date"], PDO::PARAM_STR);
        $query->bindValue(":adress",  $user["adress"]);
        $query->bindValue(":password", $user["password"], PDO::PARAM_STR);
        $query->bindValue(":phone_number",  $user["phone_number"], PDO::PARAM_INT);
        $query->bindValue(":email",  $user["email"]);
        $query->bindValue(":genre",  $user["genre"]);
        
        $query->execute();
        // on récupère l'id du nouvel utilisateur
        $id = $db->lastInsertId();

        // $_SESSION["user"] = [
        //     "id"=>$id,
        //     "firstname" => $_POST["firstname"],
        //     "name"=> $_POST["lastname"],
        //     "email"=>$_POST["email"],
        // ];
        header("Location: userlist.php");
        
    }
    
} else {
        die("Erreur lors de la bascule. Veuillez réessayer.");
}

