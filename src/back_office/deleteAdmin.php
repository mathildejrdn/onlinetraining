<?php
session_start();


if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");

    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM administrateurs WHERE id = :id";
    $query =$db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $admin = $query->fetch();

    if(!$admin){
        header("Location: ../index.php");
        exit;
    } else {
        $sql= "DELETE FROM administrateurs WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        header("Location: adminList.php");
        exit;
    }
} else {
    die("l'administrateur n'est pas supprimé");
}