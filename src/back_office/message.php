<?php
session_start();

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


include("../connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit;
}

$messageStatus = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $db->prepare("SELECT * FROM administrateurs WHERE id = ?");
    $recupUser->execute(array($getid));

    if ($recupUser->rowCount() > 0) {
        $user = $recupUser->fetch();
        $userName = htmlspecialchars($user['last_name']) . ' ' . htmlspecialchars($user['first_name']);

         // Suppression du message
         if (isset($_GET['delete']) && !empty($_GET['delete'])) {
            $deleteId = (int)$_GET['delete'];
            
            //  le message existe ou pas
    $checkMessage = $db->prepare('SELECT * FROM message WHERE id = :id');
    $checkMessage->bindValue(":id", $deleteId, PDO::PARAM_INT);
    $checkMessage->execute();

    if ($checkMessage->rowCount() > 0) {
        // Supprimer le message
        $deleteMessage = $db->prepare('DELETE FROM message WHERE id = :id');
        $deleteMessage->bindValue(":id", $deleteId, PDO::PARAM_INT);
        $deleteMessage->execute();
       
            $messageStatus = "Message supprimé avec succès!";
        
    }  
}


        if (isset($_POST['envoyer'])) {
            $id_to = $_GET["id"];
            $message = nl2br(htmlspecialchars($_POST["message"]));
            $date_message = date("Y:m:d H:i:s");
            $filePath = '';

            if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
                $fileName = basename($_FILES['attachment']['name']);
                $filePath = '../messages/uploads/' . $fileName;
                if (!move_uploaded_file($_FILES['attachment']['tmp_name'], $filePath)) {
                    echo "Erreur de téléchargement.";
                    exit;
                }
            }

            if (!empty($message) || !empty($filePath)) {
                $insererMessage = $db->prepare('INSERT INTO message(id_from, id_to, message, date_message, `read`, `file`) VALUES (?, ?, ?, ?, ?, ?)');
                $insererMessage->execute(array($_SESSION["id"], $id_to, $message, $date_message, 0, $filePath));
                $messageStatus = "Message envoyé avec succès!";
            } else {
                $messageStatus = "Le champ message et le fichier joint sont vides.";
            }
        }

        $recupMessage = $db->prepare('SELECT * FROM message JOIN administrateurs ON message.id_from = administrateurs.id WHERE (id_from = ? AND id_to = ?) OR (id_from = ? AND id_to = ?)');
        $recupMessage->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id']));
    }
} else {
    echo "ID utilisateur non valide.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message privé</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<section style="display:flex;">
<?php include('navback.php'); ?>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Bonjour, <?php echo $userName; ?></h1>

        <div class="bg-white p-4 rounded shadow">
            <?php while($message = $recupMessage->fetch()): ?>
                <div class="mb-4">
                    <?php if ($message['id_to'] == $_SESSION['id']): ?>
                        <div class="text-right">
                            <p class="text-red-500"><?php echo htmlspecialchars($message['first_name']) . ' ' . htmlspecialchars($message['last_name']); ?></p>
                            <p class="bg-red-100 p-2 rounded inline-block"><?php echo $message['message']; ?></p>
                            <p class="text-xs text-gray-500"><?php echo $message['date_message']; ?></p>
                            <?php if (!empty($message['file'])): ?>
                                <a href="<?php echo $message['file']; ?>" download>
                                    <img src="../images/pj.png" alt="Attachment" class="inline-block">
                                </a>
                                
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div>
                            <p class="bg-green-100 p-2 rounded inline-block"><?php echo $message['message']; ?></p>
                            <p class="text-xs text-gray-500"><?php echo $message['date_message']; ?></p>
                            <?php if (!empty($message['file'])): ?>
                                <a href="<?php echo $message['file']; ?>" target="_blank">
                                    <img src="../images/pj.png" alt="Attachment" class="inline-block">
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <a href="?id=<?php echo $getid; ?>&delete=<?php echo $message['0']; ?>" class="text-red-500 hover:text-red-700">Supprimer</a>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="bg-white p-4 rounded shadow mt-4">
            <?php if (!empty($messageStatus)): ?>
                <div class="mb-4 p-2 <?php echo strpos($messageStatus, 'succès') !== false ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> rounded">
                    <?php echo $messageStatus; ?>
                </div>
            <?php endif; ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="message" class="block text-gray-700">Message:</label>
                    <textarea name="message" id="message" class="w-full p-2 border rounded"></textarea>
                </div>
                <div class="mb-4">
                    <label for="attachment" class="block text-gray-700">Pièce jointe:</label>
                    <input type="file" name="attachment" id="attachment" class="block w-full text-gray-700 border rounded">
                </div>
                <button type="submit" name="envoyer" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Envoyer</button>
            </form>
        </div>
    </div>
    </section>
</body>

</html>


           

    