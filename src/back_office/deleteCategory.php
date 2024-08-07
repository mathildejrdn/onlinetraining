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
    $id = strip_tags($_GET["id"]);
    $sql="SELECT * FROM categories WHERE id = :id";
    $query=$db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $categorie= $query->fetch();

    if(!$categorie){
        header("Location: ../index.php");
        exit;
    } else {
        $sql= "DELETE FROM categories WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();
        header("Location: categories.php");
        exit;
    }
} else {
    die("la catégorie n'est pas supprimée");
}