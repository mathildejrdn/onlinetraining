<?php
session_start();
if(!empty($_POST)){
    if(isset($_POST["categorie"]) && !empty($_POST["categorie"]) && isset($_POST["categorie_genre"]) && !empty($_POST["categorie_genre"])){

        require_once("../connect.php");

        $sql = "INSERT INTO categories (nom_categorie, categorie_genre) VALUES (:nom_categorie, :categorie_genre)";
        
        $query = $db->prepare($sql);
        $query->bindValue(":nom_categorie", $_POST["categorie"], PDO::PARAM_STR);
        $query->bindValue(":categorie_genre", $_POST["categorie_genre"], PDO::PARAM_STR);
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
    <title>Ajouter une catégorie</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>

    <form action="" method="post">
        <label for="categorie">Nom de la catégorie</label>
        <input type="text" name="categorie" id="categorie" required>
        
        <label for="categorie_genre">Genre de la catégorie</label>
        <select name="categorie_genre" id="categorie_genre" required>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="unisex">Unisex</option>
        </select>
        
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
