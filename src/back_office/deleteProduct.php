<?php
session_start();


if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");

    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = :id";
    $query =$db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();

    if(!$user){
        header("Location: ../index.php");
        exit;
    } else {
        $sql= "DELETE FROM products WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        header("Location: products.php");
        exit;
    }
} else {
    die("le produit n'est pas supprimé");
}