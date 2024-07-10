<?php
session_start();

// Accès que pour les admins
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

require_once("../connect.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = strip_tags($_GET["id"]);

    $sql = "SELECT * FROM products WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $produits = $query->fetch();
} else {
    header("Location: tableauProduits.php");
    exit();
}

if (!empty($_POST)) {
    if (isset($_POST["ref"], $_POST["marque"], $_POST["categorie"], $_POST["couleur"], $_POST["matiere"], $_POST["motif"], $_POST["taille"], $_POST["genre"], $_POST["stock"], $_POST["prix"])) {

        $ref = strip_tags($_POST["ref"]);
        $marque = strip_tags($_POST["marque"]);
        $categorie = strip_tags($_POST["categorie"]);
        $couleur = strip_tags($_POST["couleur"]);
        $matiere = strip_tags($_POST["matiere"]);
        $motif = strip_tags($_POST["motif"]);
        $taille = strip_tags($_POST["taille"]);
        $genre = strip_tags($_POST["genre"]);
        $stock = strip_tags($_POST["stock"]);
        $prix = strip_tags($_POST["prix"]);

        $imageUpdated = false;

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
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

            if (!array_key_exists($imageExtension, $allowed) || !in_array($imageType, $allowed)) {
                die("Type de fichier non autorisé. Seuls les fichiers JPG, JPEG et PNG sont autorisés.");
            } else {
                $newname = md5(uniqid());
                $newfilename = "back_office/uploads/$newname.$imageExtension";
                if (!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)) {
                    die("L'upload a échoué");
                }
                $imageUpdated = true;
            }
        }

        if ($imageUpdated) {
            $sql = "UPDATE products SET reference_produit = :reference_produit, marque = :marque, image = :image, categorie = :categorie, couleur = :couleur, matiere = :matiere, stock = :stock, motif = :motif, taille = :taille, genre = :genre, prix = :prix WHERE id = :id";
        } else {
            $sql = "UPDATE products SET reference_produit = :reference_produit, marque = :marque, categorie = :categorie, couleur = :couleur, matiere = :matiere, stock = :stock, motif = :motif, taille = :taille, genre = :genre, prix = :prix WHERE id = :id";
        }

        $query = $db->prepare($sql);
        $query->bindValue(":reference_produit", $ref, PDO::PARAM_STR);
        $query->bindValue(":marque", $marque, PDO::PARAM_STR);
        if ($imageUpdated) {
            $query->bindValue(":image", $newfilename, PDO::PARAM_STR);
        }
        $query->bindValue(":categorie", $categorie, PDO::PARAM_STR);
        $query->bindValue(":couleur", $couleur, PDO::PARAM_STR);
        $query->bindValue(":matiere", $matiere, PDO::PARAM_STR);
        $query->bindValue(":stock", $stock, PDO::PARAM_INT);
        $query->bindValue(":motif", $motif, PDO::PARAM_STR);
        $query->bindValue(":taille", $taille, PDO::PARAM_STR);
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);
        $query->bindValue(":prix", $prix, PDO::PARAM_STR);
        $query->bindValue(":id", $id, PDO::PARAM_INT);

        $query->execute();
        header("Location: products.php");
        exit();
    } else {
        die("Le formulaire est incomplet.");
    }
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full">
        <h1 class="text-2xl font-bold mb-4">Modifier le Produit <?=$produits['reference_produit']?></h1>
        <div class="relative z-0 w-full mb-5 group">
            <img src="./<?=$produits['image']?>" alt="Image actuelle du produit" class="w-full mb-3">
            <label for="current_image" class="block text-sm text-gray-700 mb-2">Image actuelle du produit</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="image" id="image" value="./<?=$produits['image']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" />
            <label for="image" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Modifier l'image du produit</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="ref" id="ref" value="<?=$produits['reference_produit']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="ref" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Référence produit</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="marque" id="marque" value="<?=$produits['marque']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="marque" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marque du produit</label>
        </div>
        <?php
        $sql = "SELECT * FROM categories";
        $query = $db->prepare($sql);
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="relative z-0 w-full mb-5 group">
            <select name="categorie" id="categorie" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>Choisir une catégorie</option>
                <?php foreach($categories as $categorie):?>
                <option value="<?=$categorie["nom_categorie"]?>" <?=($produits['categorie'] == $categorie["id"]) ? 'selected' : '';?>><?=$categorie["nom_categorie"] . " " . $categorie["categorie_genre"]?></option>
                <?php endforeach;?>
            </select>
            <label for="categorie" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Categorie</label>
        </div>
       
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="couleur" id="couleur" value="<?=$produits['couleur']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="couleur" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Couleur</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="matiere" id="matiere" value="<?=$produits['matiere']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="matiere" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Matière</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="motif" id="motif" value="<?=$produits['motif']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="motif" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Motif</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="taille" id="taille" value="<?=$produits['taille']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="taille" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Taille</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="genre" id="genre" value="<?=$produits['genre']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="genre" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="stock" id="stock" value="<?=$produits['stock']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="stock" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="prix" id="prix" value="<?=$produits['prix']?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="prix" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix</label>
        </div>
        <button type="submit" class="w-full bg-red-600 text-white py-2.5 rounded">Mettre à jour</button>
    </form>
</body>

</html>
