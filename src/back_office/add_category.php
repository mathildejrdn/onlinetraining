<?php
session_start();
if(!empty($_POST)){
    if(isset($_POST["categorie"]) && !empty($_POST["categorie"])){

        require_once("../connect.php");

        $sql= "INSERT INTO categories (nom_categorie) VALUES (:nom_categorie)";
        
        $query=$db->prepare($sql);
        $query->bindValue(":nom_categorie", $_POST["categorie"], PDO::PARAM_STR);
        $query->execute();

        header("Location: products.php");
        exit();

    } else {
        die("Le formulaire est incomplet");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>

    <form action="" method="post">
        <label for="categorie">Ajouter une catégorie</label>
        <input type="text" name="categorie">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>