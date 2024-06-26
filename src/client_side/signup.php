<?php
session_start();
$_SESSION["error"] = [];

if(!empty($_POST)){
    if(isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["pass"], $_POST["pass2"], $_POST["birthdate"], $_POST["adress"], $_POST["phonenumber"], $_POST["genre"]) 
    && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"]) && !empty($_POST["birthdate"]) && !empty($_POST["adress"]) && !empty($_POST["phonenumber"]) && !empty($_POST["genre"]))
    {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"][] = "L'adresse email est incorrecte"; 
        }
        if($_POST["pass"] !== $_POST["pass2"]){
            $_SESSION["error"][] = "Les mots de passe ne correspondent pas";
        }

        // Validate phone number
        if (!preg_match('/^[0-9]{10}$/', $_POST["phonenumber"])) {
            $_SESSION["error"][] = "Le numéro de téléphone est incorrect";
        }
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);
        require_once("../connect.php");

        $sql = "INSERT INTO `users` (`first_name`, `last_name`,`password`, `birth_date`, `adress`, `phone_number`, `email`, `genre`) VALUE (:first_name, :last_name, :password, :birth_date, :adress, :phone_number, :email, :genre)";

        $query = $db->prepare($sql);
        $query->bindValue(":first_name",  $_POST["firstname"]);
        $query->bindValue(":last_name",  $_POST["lastname"]);
        $query->bindValue(":birth_date",  $_POST["birthdate"], PDO::PARAM_STR);
        $query->bindValue(":adress",  $_POST["adress"]);
        $query->bindValue(":password", $pass, PDO::PARAM_STR);
        $query->bindValue(":phone_number",  $_POST["phonenumber"], PDO::PARAM_INT);
        $query->bindValue(":email",  $_POST["email"]);
        $query->bindValue(":genre",  $_POST["genre"]);
        
        $query->execute();
        // on récupère l'id du nouvel utilisateur
        $id = $db->lastInsertId();

        $_SESSION["user"] = [
            "id"=>$id,
            "firstname" => $_POST["firstname"],
            "name"=> $_POST["lastname"],
            "email"=>$_POST["email"],
        ];
        header("Location: ../index.php");
        
    } else {
        $_SESSION["error"][] = "Erreur lors de l'inscription. Veuillez réessayer.";
    }
} 

if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
foreach($_SESSION["error"] as $message){
echo "<p>{$message}</p>";
}
unset($_SESSION["error"]);
}

// include_once("components/navbar.php");
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form id="signup_form" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Inscription</h1>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="firstname" id="firstname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="firstname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="lastname" id="lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="lastname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="date" name="birthdate" id="birthdate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="birthdate" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date de naissance</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="pass" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot de passe</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="pass2" id="pass2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="pass2" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmer votre mot de passe</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="email" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="adress" id="adress" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="adress" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="phonenumber" id="phonenumber" pattern="[0-9]{10}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="phonenumber" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro de téléphone</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select name="genre" id="genre" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>Quel est votre genre ?</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select>
            <label for="genre" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sexe</label>
        </div>
        <div id="signup_btn">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">M'inscrire</button>
        </div>
    </form>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("signup_form");
        form.addEventListener("submit", function(event) {
            var pass1 = document.getElementById("pass").value;
            var pass2 = document.getElementById("pass2").value;

            if (pass1 !== pass2) {
                alert("Les mots de passe ne correspondent pas !");
                event.preventDefault(); // Empêche l'envoi du formulaire
            }
        });
    });
</script>

</body>
</html>