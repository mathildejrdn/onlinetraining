<?php
if(!empty($_POST))
{
    if(isset($_POST["ref"], $_POST["marque"], $_POST["categorie"], $_POST["nom"], $_POST["couleur"], $_POST["matiere"], $_POST["motif"], $_POST["taille"], $_POST["genre"], $_POST["stock"], $_POST["prix"], $_POST["description"]) && !empty($_POST["ref"]) && !empty($_POST["marque"]) && !empty($_POST["categorie"]) && !empty($_POST["nom"]) && !empty($_POST["couleur"]) && !empty($_POST["matiere"]) && !empty($_POST["motif"]) && !empty($_POST["taille"]) && !empty($_POST["genre"])&& !empty($_POST["stock"]) && !empty($_POST["prix"]) && !empty($_POST["description"]))

    $ref= strip_tags($_POST["ref"]);
    $marque= strip_tags($_POST["marque"]);
    $categorie= strip_tags($_POST["categorie"]);
    $nom= strip_tags($_POST["nom"]);
    $couleur= strip_tags($_POST["couleur"]);
    $matiere= strip_tags($_POST["matiere"]);
    $motif= strip_tags($_POST["motif"]);
    $taille= strip_tags($_POST["taille"]);
    $genre= strip_tags($_POST["genre"]);
    $stock= strip_tags($_POST["stock"]);
    $prix= strip_tags($_POST["prix"]);
    $description= strip_tags($_POST["description"]);

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
            require("../connect.php");

             // Écrire la requête
             $sql = "INSERT INTO `products`(`reference_produit`, `marque`, `image`, `categorie`, `nom`, `couleur`, `matiere`, `stock`, `motif`,`taille`,`genre`,`prix`,`description`) VALUES (:reference_produit, :marque, :image, :categorie, :nom, :couleur, :matiere, :stock, :motif, :taille, :genre, :prix, :description)";
             $query = $db->prepare($sql);
             $query->bindValue(":reference_produit", $ref, PDO::PARAM_INT);
             $query->bindValue(":marque", $marque, PDO::PARAM_STR);
             $query->bindValue(":image", $newfilename, PDO::PARAM_STR);
             $query->bindValue(":categorie", $categorie, PDO::PARAM_STR);
             $query->bindValue(":nom", $nom, PDO::PARAM_STR);
             $query->bindValue(":couleur", $couleur, PDO::PARAM_STR);
             $query->bindValue(":matiere", $matiere, PDO::PARAM_STR);
             $query->bindValue(":stock", $stock, PDO::PARAM_INT);
             $query->bindValue(":motif", $motif, PDO::PARAM_STR);
             $query->bindValue(":taille", $taille, PDO::PARAM_STR);
             $query->bindValue(":genre", $genre, PDO::PARAM_STR);
             $query->bindValue(":prix", $prix, PDO::PARAM_INT);
             $query->bindValue(":description", $description, PDO::PARAM_STR);

             $query->execute();
            header("Location: products.php");
            exit();
            }
        } else {
            die("Le formulaire est incomplet.");
        }  
}

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

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <form class="max-w-md bg-white p-6 rounded shadow-md w-full" method="post" enctype="multipart/form-data">
            <h1 class="text-2xl font-bold mb-4">Ajouter un produit</h1>

            <!-- Référence produit -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="ref" id="ref"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="ref"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Référence
                    produit</label>
            </div>

            <!-- Marque -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="marque" id="marque"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="marque"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marque</label>
            </div>
            <?php
                require("../connect.php");
                $sql = "SELECT * FROM categories";
                $query = $db->prepare($sql);
                $query->execute();
                $categories = $query->fetchAll(PDO::FETCH_ASSOC);
                ?>
            <!-- Categorie -->
            <div class="relative z-0 w-full mb-5 group">
                <select name="categorie" id="categorie"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    required>
                    <option value="" disabled selected>Choisir une catégorie</option>
                    <?php foreach($categories as $categorie):?>
                    <option value="<?=$categorie["id"]?>"><?=$categorie["nom_categorie"]?></option>
                    <?php endforeach;?>
                </select>
                <label for="categorie"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Categorie</label>
            </div>

            <!-- Nom du produit-->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nom" id="nom"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="nom"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom
                    du produit</label>
            </div>

            <!-- Couleur -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="couleur" id="couleur"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="couleur"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Couleur</label>
            </div>

            <!-- Matière -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="matiere" id="matiere"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="matiere"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Matière</label>
            </div>

            <!-- Motif -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="motif" id="motif"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="motif"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Motif</label>
            </div>

            <!-- description -->
            <div class="relative z-0 w-full mb-5 group">
                <textarea name="description" id="description"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required></textarea>
                <label for="description"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
            </div>

            <!-- Taille -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="taille" id="taille"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="taille"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Taille</label>
            </div>

            <!-- Sexe -->
            <div class="relative z-0 w-full mb-5 group">
                <select name="genre" id="genre"
                    class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    required>
                    <option value="" disabled selected>Choisir une catégorie</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
                <label for="genre"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre</label>
            </div>

            <!-- Quantité en stock -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="stock" id="stock" min="0"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="stock"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantité
                    en stock</label>
            </div>

            <!-- Prix HT -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" step="0.01" name="prix" id="prix" min="0"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="prix"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix
                    HT</label>
            </div>

            <!-- Image -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="file" name="image" id="image"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer"
                    placeholder=" " required />
                <label for="image"
                    class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image</label>
            </div>

            <!-- Bouton Envoyer -->
            <div id="bouton">
                <div id="previsualiser" class="mt-4 text-center">
                    <a href="signup.php" class="text-red-700 hover:underline inline-flex items-center space-x-2">
                        <span>Prévisualisez l'article</span>
                    </a>

                    <button type="submit"
                        class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 flex items-center justify-center space-x-2">
                        <span>Ajouter le produit</span>
                    </button>

                </div>
        </form>
    </div>
</body>

</html>