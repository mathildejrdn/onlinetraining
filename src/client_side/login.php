<?php
session_start();
$_SESSION["error"] = [];

if(isset($_SESSION["user"])){
    header("Location: index.php");
    exit;
}

if(!empty($_POST)){
  
    if(isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])
    ){

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"][]="Ce n'est pas un email";
        } else {
            // require_once("connect.php");

            $sql = "SELECT * FROM `users` WHERE `email` = :email";

            $query = $db->prepare($sql);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            if(!$user){
                $_SESSION["error"][]="l'utilisateur et/ou le mdp est incorrect";
            } else {
                // on vérifie si le mdp correspond
                if(!password_verify($_POST["pass"], $user["password"])){
                    $_SESSION["error"][]="L'utilisateur et ou le mot de passe est incorrect";
                } else {
                    $_SESSION["user"]=[
                        "id" =>  $user["id"],
                        "firstname" => $user['first_name'],
                        "name" => $user['last_name'],
                        "email" => $user['email'],
                        "birthdate" => $user["birth_date"],
                        "adress" => 
                    ]
                }
            }

        }

    }
}        


?>
<form class="login_form" method="post">
    <h1>Connexion</h1>
    <div class="login_container">
        <div class="email">
            <label for="email">Email</label>
            <input type="email" name="email" class="email" required>
        </div>
        <div class="password_container">
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="pass" required>
        </div>
        <div id="bouton">
            <button type="submit">Me connecter</button>
        </div>
    </div>
</form>
<div id="inscription"><a href="singup.php">Cliquez ici si vous n'êtes pas enregistré</a></div>
</body>
</html>