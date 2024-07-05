<?php
session_start();
$_SESSION["error"] = [];

if(isset($_SESSION["user"]) || isset($_SESSION["admin"])){
    header("Location: ../index.php");
    exit;
}

if(!empty($_POST)){
    if(isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])
    ){

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"][]="Ce n'est pas un email";
        } else {
            require_once("../connect.php");

            $sql = "SELECT * FROM `users` WHERE `email` = :email";

            $query = $db->prepare($sql);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            if($user && password_verify($_POST["pass"], $user["password"])){
                $_SESSION["user"] = [
                    "id" => $user["id"],
                    "firstname" => $user['first_name'],
                    "name" => $user['last_name'],
                    "email" => $user['email'],
                    "birthdate" => $user["birth_date"],
                    "adress" => $user["adress"],
                    "phonenumber" => $user["phone_number"]
                ];
                header("Location: ../index.php");
                exit;
            }

            // Vérification des administrateurs
            $sql = "SELECT * FROM `administrateurs` WHERE `email` = :email";
            $query = $db->prepare($sql);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
            $query->execute();
            $admin = $query->fetch();

            if($admin && password_verify($_POST["pass"], $admin["password"])){
                $_SESSION["admin"] = [
                    "id" => $admin["id"],
                    "firstname" => $admin['first_name'],
                    "name" => $admin['last_name'],
                    "email" => $admin['email'],
                    "birthdate" => $admin["birth_date"],
                    "adress" => $admin["adress"]
                ];
                header("Location: ../back_office/inbox.php");
                exit;
            }

            // Si l'utilisateur ou l'administrateur n'a pas été trouvé
            $_SESSION["error"][] = "L'utilisateur et/ou le mot de passe est incorrect";
        }
    } else {
        $_SESSION["error"][] = "Le formulaire est incomplet";
    }
}
if(isset($_SESSION["error"])){
    foreach($_SESSION["error"] as $message){
        ?>
        <p><?=$message?></p>
        <?php
    }
    unset($_SESSION["error"]);
}
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
    <form class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Connexion</h1>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="email" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="pass" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot de passe</label>
        </div>
        <div id="bouton">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">Me connecter</button>
        </div>
        <div id="inscription" class="mt-4 text-center">
        <a href="signup.php" class="text-red-700 hover:underline">Cliquez ici si vous n'êtes pas enregistré</a>
    </div>  
    </form>
   
</body>
</html>
