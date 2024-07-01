<?php
session_start();
if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");

    $id = strip_tags($_GET["id"]);
    $sql="SELECT * FROM administrateurs WHERE id = :id";

    $query=$db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $admins= $query->fetch();

    if(!$admins) {
        header("Location: adminList.php");
        exit();
    }

} else {
    header("Location: adminList.php");
}
if(!empty($_POST))
{
    if(isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["adress"], $_POST["phonenumber"], $_POST["role"]) 
    && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["adress"]) && !empty($_POST["phonenumber"])  && !empty($_POST["role"]))
    {
        // Connexion à la bdd
        require_once("../connect.php");

        $sql="UPDATE administrateurs SET first_name = :first_name, last_name = :last_name, adress = :adress, phone_number = :phone_number, email = :email, role = :role WHERE id = :id";

        $query=$db->prepare($sql);
        $query->bindValue(":first_name", $_POST["firstname"]);
        $query->bindValue(":last_name", $_POST["lastname"]);
        $query->bindValue(":adress", $_POST["adress"]);
        $query->bindValue(":email", $_POST["email"]);
        $query->bindValue(":role", $_POST["role"]);
        $query->bindValue(":phone_number", $_POST["phonenumber"], PDO::PARAM_INT);
        $query->bindValue(":id", $id, PDO::PARAM_INT);

        $query-> execute();

        header("Location: adminList.php");
        exit();
    } else {
        die("Le formulaire est incomplet");
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Profil Utilisateur</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form id="profile_form" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Éditer le Profil de <?=$admins["first_name"]?></h1>
        <!-- <h2 class="text-xl font-semibold text-red-600 mb-4">Rôle: Utilisateur</h2> -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="firstname" id="firstname" value="<?=$admins["first_name"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="firstname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="lastname" id="lastname" value="<?=$admins["last_name"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="lastname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" value="<?=$admins["email"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="email" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="adress" id="adress" value="<?=$admins["adress"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="adress" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="phonenumber" id="phonenumber" value="<?=$admins["phone_number"]?>"pattern="[0-9]{10}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="phonenumber" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro de téléphone</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select name="role" id="role" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>rôle de l'administrateur</option>
                <option value="superAdmin" <?= $admins["role"] == "superAdmin" ? "selected" : "" ?>>Super admin</option>
                <option value="secretaire">Secrétaire</option>
                <option value="logisticien">logisticien</option>
                <option value="comptable">comptable</option>
            </select>
            <label for="role" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rôle</label>
        </div>
        <!-- Section pour les rôles (visible uniquement pour le compte formateur) -->
        
        <div id="profile_btn">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 mb-5">Mettre à jour</button>
        </div>
    </form>
</body>
</html>
