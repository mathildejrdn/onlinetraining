<?php
session_start();
$_SESSION["error"] = [];

if(!empty($_POST)){
    if(isset($_POST["firstname"], $_POST["name"],$_POST["email"], $_POST["pass"], $_POST["pass2"], $_POST["birthdate"], $_POST["adress"], $_POST["phone"], $_POST["sexe"]) 
    && !empty($_POST["firstname"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"]) && !empty($_POST["birthdate"]) && !empty($_POST["adress"]) && !empty($_POST["phone"]), && !empty($_POST["sexe"]))
    {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"][] = "L'adresse email est incorrecte"; 
        }
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);
        require_once("connect.php");

        $sql = "INSERT INTO `users` (`first_name`, `last_name`,`password`, birth_date`, adress`, `phone_number`, `email`, `sexe`) VALUE (:first_name, :last_name, '$pass', :birth_date, :adress, :phone_number :email, :sexe)";

        $query = $db->prepare($sql);
        $query->bindValue(":firstname",  $_POST["firstname"]);
        $query->bindValue(":last_name",  $_POST["lastname"]);
        $query->bindValue(":birth_date",  $_POST["birthdate"], PDO::PARAM_DATE);
        $query->bindValue(":adress",  $_POST["adress"]);
        $query->bindValue(":phone_number",  $_POST["phonenumber"], PDO::PARAM_INT);
        $query->bindValue(":email",  $_POST["email"]);
        $query->bindValue(":sexe",  $_POST["sexe"]);
        
        $query->execute();
        // on récupère l'id du nouvel utilisateur
        $id = $db->lastInsertId();

        $_SESSION["user"] = [
            "id"=>$id,
            "firstname" => $_POST["firstname"],
            "name"=> $_POST["name"],
            "email"=>$_POST["email"],
        ];
        header("Location: index.php");
    } else {
        $_SESSION["error"]=["Le formulaire est incomplet"];
    }
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
            <input type="number" name="phonenumber" id="phonenumber" required>
        </div>
        <div id="sexe_container">
            <label for="sexe">Sexe</label><br>
            <select name="sexe" id="sexe">
                <option value="sexe">Quel est votre sexe ?</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select required>
        </div>
        <div id="signup_btn">
            <button type="submit">M'inscrire</button>
        </div>
    </div>
</form>
</body>
</html>