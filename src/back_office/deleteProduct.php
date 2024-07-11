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

if(!empty($_POST)){
if(isset($_POST) &&!empty($_POST)){
    require_once("../connect.php");
    foreach($_POST as $key => $value) {

        $sql= "DELETE FROM products WHERE id = :id";
        $query =$db->prepare($sql);
        $query->bindValue(":id", $key, PDO::PARAM_INT);
        $query->execute();
        
    }header("Location: products.php");
        exit;
  
}else {
    die("les produits ne sont pas supprimé");
}

}if(isset($_GET["id"]) && !empty($_GET["id"])){
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