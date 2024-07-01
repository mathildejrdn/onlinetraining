<?php

if(!isset($_GET["id"]) || empty($_GET["id"])){
    
    header("Location: index.php");
}
$id= strip_tags($_GET["id"]);
require_once("connect.php");
$sql = "SELECT * FROM products WHERE id = :id";

$query=$db->prepare($sql);
$query->bindValue("id", $id, PDO::PARAM_INT);
$query->execute();
$product=$query->fetch();
if(!$product){
    // dans ce cas la erreur 404
    http_response_code(404);
    echo "Article inexistant";
    exit;
}

include_once("./includes/navbar.php");
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="font.css">
  <script src="script.js"></script>
</head>