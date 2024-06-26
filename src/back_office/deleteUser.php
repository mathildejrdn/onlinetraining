<?php
session_start();


if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");

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
        $sql= "DELETE FROM users WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        header("Location: userlist.php");
        exit;
    }
} else {
    die("l'utilisateur n'est pas supprimé");
}