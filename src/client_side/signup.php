<?php
session_start();
$_SESSION["error"] = [];

if(!empty($_POST)){
    if(isset($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["pass"], $_POST["pass2"], $_POST["birthdate"], $_POST["adress"], $_POST["phonenumber"], $_POST["sexe"]) 
    && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"]) && !empty($_POST["birthdate"]) && !empty($_POST["adress"]) && !empty($_POST["phonenumber"]) && !empty($_POST["sexe"]))
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

        $sql = "INSERT INTO `users` (`first_name`, `last_name`,`password`, `birth_date`, `adress`, `phone_number`, `email`, `sexe`) VALUE (:first_name, :last_name, :password, :birth_date, :adress, :phone_number, :email, :sexe)";

        $query = $db->prepare($sql);
        $query->bindValue(":first_name",  $_POST["firstname"]);
        $query->bindValue(":last_name",  $_POST["lastname"]);
        $query->bindValue(":birth_date",  $_POST["birthdate"], PDO::PARAM_STR);
        $query->bindValue(":adress",  $_POST["adress"]);
        $query->bindValue(":password", $pass, PDO::PARAM_STR);
        $query->bindValue(":phone_number",  $_POST["phonenumber"], PDO::PARAM_INT);
        $query->bindValue(":email",  $_POST["email"]);
        $query->bindValue(":sexe",  $_POST["sexe"]);
        
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

<form id ="signup_form"method="post">
<h1>Inscription</h1>
    <div class="signup-container">
        <div class="firstname_contenaire">
            <label for="firstname">Prénom</label><br>
            <input type="text" name="firstname" id="firstname" required>
        </div>
        <div id="name_container">
            <label for="lastname">Nom</label><br>
            <input type="text" name="lastname" id="lastname" required>
        </div>
        <div id="birthdate_container">
            <label for="birthdate">Date de naissance</label><br>
            <input type="date" name="birthdate" id="birthdate" required>
        </div>

        <div id="mdp_container">
            <label for="pass">Mot de passe</label><br>
            <input type="password" name="pass" id="pass" required>
        </div>
        <div id="mdp_container">
            <label for="pass2">Confirmer votre mot de passe</label><br>
            <input type="password" name="pass2" id="pass2" required>
        </div>
        <div id="mail_container">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" required>
        </div>
        <div id="adress_container">
            <label for="adress">Adresse</label><br>
            <input type="text" name="adress" id="adress" required>
        </div>
        <div id="phone_container">
            <label for="phonenumber">Numéro de téléphone</label><br>
            <input type="tel" name="phonenumber" id="phonenumber" pattern="[0-9]{10}" required>
        </div>
        <div id="sexe_container">
            <label for="sexe">Sexe</label><br>
            <select name="sexe" id="sexe">
                <option value="sexe">Quel est votre sexe ?</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select required>
        </div>
        <div id="signup_btn">
            <button type="submit">M'inscrire</button>
        </div>
    </div>
</form>
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