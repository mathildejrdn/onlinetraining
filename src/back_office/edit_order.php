<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Éditer Commande</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form id="order_form" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Éditer la Commande #12345</h1>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="firstname" id="firstname" value="Jean" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="firstname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="lastname" id="lastname" value="Dupont" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="lastname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="adress" id="adress" value="123 Rue Exemple" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="adress" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="phonenumber" id="phonenumber" value="0123456789" pattern="[0-9]{10}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="phonenumber" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro de téléphone</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <textarea name="summary" id="summary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required>Résumé de la commande ici</textarea>
            <label for="summary" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Résumé de la commande</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select name="status" id="status" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>Statut de la commande</option>
                <option value="pending">En attente</option>
                <option value="in_progress">En cours</option>
                <option value="completed">Terminée</option>
            </select>
            <label for="status" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Statut de la commande</label>
        </div>
        <div id="order_btn">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 mb-5">Enregistrer</button>
        </div>
    </form>
</body>
</html>



<!-- <?php
session_start();
if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");

    $id = strip_tags($_GET["id"]);
    $sql="SELECT * FROM panier WHERE id = :id";

    $query=$db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();

    $panier = $query->fetch();

    if(!$panier) {
        header("Location: orders.php");
        exit();
    }

} else {
    header("Location: orders.php");
}

if(!empty($_POST))
{
    if(isset($_POST["firstname"], $_POST["lastname"], $_POST["adress"], $_POST["phonenumber"], $_POST["summary"], $_POST["status"]) 
    && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["adress"]) && !empty($_POST["phonenumber"]) && !empty($_POST["summary"]) && !empty($_POST["status"]))
    {
        require_once("../connect.php");

        $sql = "UPDATE panier SET first_name = :first_name, last_name = :last_name, adress = :adress, phone_number = :phone_number, summary = :summary, status = :status WHERE id = :id";

        $query = $db->prepare($sql);
        $query->bindValue(":first_name", $_POST["firstname"]);
        $query->bindValue(":last_name", $_POST["lastname"]);
        $query->bindValue(":adress", $_POST["adress"]);
        $query->bindValue(":phone_number", $_POST["phonenumber"], PDO::PARAM_INT);
        $query->bindValue(":summary", $_POST["summary"]);
        $query->bindValue(":status", $_POST["status"]);
        $query->bindValue(":id", $id, PDO::PARAM_INT);

        $query->execute();

        header("Location: orders.php");
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
  <title>Éditer Commande</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form id="order_form" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Éditer la Commande #<?=$panier["id"]?></h1>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="firstname" id="firstname" value="<?=$panier["first_name"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="firstname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="lastname" id="lastname" value="<?=$panier["last_name"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="lastname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="adress" id="adress" value="<?=$panier["adress"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="adress" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="phonenumber" id="phonenumber" value="<?=$panier["phone_number"]?>" pattern="[0-9]{10}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="phonenumber" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro de téléphone</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <textarea name="summary" id="summary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required><?=$panier["summary"]?></textarea>
            <label for="summary" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Résumé de la commande</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select name="status" id="status" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>Statut de la commande</option>
                <option value="pending" <?= $panier["status"] == "pending" ? "selected" : "" ?>>En attente</option>
                <option value="in_progress" <?= $panier["status"] == "in_progress" ? "selected" : "" ?>>En cours</option>
                <option value="completed" >Terminée</option>
            </select>
            <label for="status" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Statut de la commande</label>
        </div>
        <div id="order_btn">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 mb-5">Enregistrer</button>
        </div>
    </form>
</body>
</html> -->
