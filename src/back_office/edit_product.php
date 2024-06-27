<?php
if (isset($_GET["id"])&& !empty($_GET["id"])){
    // déja ça va vérifier si la var est défini avec isset et ensuite si il y a l'id dqns l'url

require_once("../connect.php"); // ne pas oublier de connecter avec require_once
// echo $_GET["id"];
$id = strip_tags($_GET["id"]);

$sql = "SELECT * FROM products WHERE id = :id";
$query = $db->prepare($sql); // on prépare la requête, on demande la $db mais il faut la connecter avec require
// on accroche la valeur id de la requête à celle de la variable $id
$query->bindValue(":id", $id, PDO::PARAM_INT); 
$query->execute();

$produits = $query->fetch();

} else {
    header("Location: tableauProduits.php");
}
if(!empty($_POST))
{
    if(isset($_POST["ref"], $_POST["marque"], $_POST["type"], $_POST["couleur"], $_POST["matiere"], $_POST["motif"], $_POST["taille"], $_POST["genre"], $_POST["stock"], $_POST["prix"]) && !empty($_POST["ref"]) && !empty($_POST["marque"]) && !empty($_POST["type"]) && !empty($_POST["couleur"]) && !empty($_POST["matiere"]) && !empty($_POST["motif"]) && !empty($_POST["taille"]) && !empty($_POST["genre"])&& !empty($_POST["stock"]) && !empty($_POST["prix"])){

        $ref= strip_tags($_POST["ref"]);
        $marque= strip_tags($_POST["marque"]);
        $type= strip_tags($_POST["stock"]);
        $couleur= strip_tags($_POST["couleur"]);
        $matiere= strip_tags($_POST["matiere"]);
        $motif= strip_tags($_POST["motif"]);
        $taille= strip_tags($_POST["taille"]);
        $genre= strip_tags($_POST["genre"]);
        $stock= strip_tags($_POST["stock"]);
        $prix= strip_tags($_POST["prix"]);

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) 
        {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $imageType = $_FILES['image']['type'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $allowed = [
                "jpg" => "image/jpeg",
                "jpeg" => "image/jpeg",
                "png" => "image/png"
            ];

            if(!array_key_exists($imageExtension, $allowed) || !in_array($imageType, $allowed))
            {
            die("Type de fichier non autorisé. Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
            } else {
            // on génère un nom unique : 
            // uniqid est un TIMESTAMP et md5 permet de le chiffré histoire d'avoir un string aléatoire
            $newname=md5(uniqid());
            // on génère le chemin complet vers le fichier:
            $newfilename = "uploads/$newname.$imageExtension";
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
                die("l'upload a échoué");
            }
            // Se connecter à la base de données
            require_once("../connect.php");

            $sql= "UPDATE products SET reference_produit = :reference_produit, marque = :marque, image = :image, type_de_produits = :type_de_produits, couleur = :couleur, matiere = :matiere, stock = :stock, motif = :motif, taille = :taille, genre = :genre, prix = :prix";

            $query=$db->prepare($sql);
            $query->bindValue(":reference_produit", $ref, PDO::PARAM_INT);
            $query->bindValue(":marque", $marque, PDO::PARAM_STR);
            $query->bindValue(":image", $newfilename, PDO::PARAM_STR);
            $query->bindValue(":type_de_produits", $type, PDO::PARAM_STR);
            $query->bindValue(":couleur", $couleur, PDO::PARAM_STR);
            $query->bindValue(":matiere", $matiere, PDO::PARAM_STR);
            $query->bindValue(":stock", $stock, PDO::PARAM_INT);
            $query->bindValue(":motif", $motif, PDO::PARAM_STR);
            $query->bindValue(":taille", $taille, PDO::PARAM_STR);
            $query->bindValue(":genre", $genre, PDO::PARAM_STR);
            $query->bindValue(":prix", $prix, PDO::PARAM_STR);

            $query->execute();
            header("Location: products.php");
            exit();
            }
        } else {
        die("Le formulaire est incomplet.");
    }  
}
}

?>

<h1>Modifier le produit <?=$produits['reference_produit']?></h1>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="ref">Référence produit</label>
        <input type="text" name="ref" value="<?=$produits['reference_produit']?>">
    </div>
    <div>
        <label for="marque">Marque du produit</label>
        <input type="text" name="marque" value="<?=$produits['marque']?>">
    </div>
    <div>
        <label for="type">Type du produit</label>
        <input type="text" name="type" value="<?=$produits['type_de_produits']?>">
    </div>
    <div>
        <label for="image">Image du produit</label>
        <input type="file" name="image" value="<?=$produits['image']?>" required>
    </div>
    <div>
        <label for="couleur">couleur du produit</label>
        <input type="text" name="couleur" value="<?=$produits['couleur']?>" required>
    </div>
    <div>
        <label for="matiere">Matière du produit</label>
        <input type="text" name="matiere" value="<?=$produits['couleur']?>" required>
    </div>
    <div>
        <label for="motif">Motif du produit</label>
        <input type="text" name="motif" value="<?=$produits['motif']?>" required>
    </div>
    <div>
        <label for="taille">Taille du produit</label>
        <input type="text" name="taille" value="<?=$produits['taille']?>" required>
    </div>
    <div>
        <label for="genre">Genre</label>
        <select name="genre">
            <option value="genre">genre</option>
            <option value="homme">homme</option>
            <option value="femme">femme</option>
        </select>
    </div>
    <div>
        <label for="stock">Stock du produit</label>
        <input type="number" name="stock" id="stock" min="0" value="<?=$produits['stock']?>" required>
    </div>
    <div>
        <label for="prix">Prix du produit</label>
        <input type="text" name="prix" required value="<?=$produits['prix']?>">
    </div>
    <div id="btn">
    <button type="submit" class="btn">Envoyer</button>
    </div>
</form>

</body>
</html>
