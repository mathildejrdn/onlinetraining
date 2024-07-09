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
    exit();
}

$myId = $_SESSION['id'];

$newMessagesCount = 0;  // Initialiser la variable
$newMessages = [];

// Compter les messages non lus
$countNewMessages = $db->prepare("SELECT COUNT(*) as new_messages FROM message WHERE id_to = ? AND `read` = 0");
$countNewMessages->execute(array($myId));
$newMessagesResult = $countNewMessages->fetch();
$newMessagesCount = $newMessagesResult['new_messages'];

// Vérifier si l'utilisateur a cliqué pour afficher les messages
$showMessages = isset($_GET['show_messages']) ? true : false;

if ($showMessages && $newMessagesCount > 0) {
    // Récupérer les messages non lus avec le nom de id_from   join
    $getNewMessages = $db->prepare("SELECT message.id, message.message, message.date_message, message.file, administrateurs.first_name, administrateurs.last_name 
        FROM message 
        JOIN administrateurs ON message.id_from = administrateurs.id 
        WHERE message.id_to = ? AND message.`read` = 0");
    $getNewMessages->execute(array($myId));
    $newMessages = $getNewMessages->fetchAll();

    // Mettre à jour les messages comme lus après les avoir récupérés
    $updateMessages = $db->prepare("UPDATE message SET `read` = 1 WHERE id_to = ? AND `read` = 0");
    $updateMessages->execute(array($myId));
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les admines</title>
    <style>
    .message-icon {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .message-icon .icon {
        font-size: 24px;
    }

    .message-icon .badge {
        position: absolute;
        top: -5px;
        right: -10px;
        background: red;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
    }

    .messages-list {
        position: absolute;
        top: 130px;
        left: 0;
        background: white;
        border: 1px solid #ccc;
        width: 300px;
        max-height: 400px;
        overflow-y: auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .message-item {
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .message-item:last-child {
        border-bottom: none;
    }
    </style>
</head>

<body>
    <?php 
    $recupUser = $db->prepare("SELECT * FROM administrateurs WHERE id != :myId");
    $recupUser->bindValue(':myId', $myId, PDO::PARAM_INT);
    $recupUser->execute();
    
    // AFFICHER UN BOUCLE POUR MONTRER LES ADMIN
    while ($administrateur = $recupUser->fetch()){
        ?>
    <a href="message.php?id=<?php echo $administrateur['id']?>">
        <p><?php echo $administrateur["last_name"]; ?> <?php echo $administrateur["first_name"]; ?></p>
    </a>
    <?php
    }
    ?>

    <!-- Affichage de l'icône de message avec le nombre de nouveaux messages -->
    <div class="message-icon">
        <span class="icon"><a href="?show_messages=1">📧</a></span>
        <span class="badge"><?php echo $newMessagesCount; ?></span>
    </div>

    <!-- Affichage de la liste des nouveaux messages si l'utilisateur a cliqué pour les afficher -->
    <?php if ($showMessages && $newMessagesCount > 0): ?>
    <div class="messages-list">
        <?php foreach ($newMessages as $message): ?>
        <div class="message-item">
            <?php echo 'Expéditeur : ' . htmlspecialchars($message['first_name']) . ' ' . htmlspecialchars($message['last_name']) . '<br>'; ?>
            <?php echo 'La date: ' . htmlspecialchars($message['date_message']) . '<br>'; ?>
            <?php echo htmlspecialchars($message['message']); ?>
            <!-- Vérification et affichage des pièces jointes -->
            <?php if (!empty($message['file'])): ?>
            <div class="file">
                <a href="<?php echo htmlspecialchars($message['file']); ?>" target="_blank" download><img
                        src="../images/pj.png" alt="Fichier"></a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p>Нет новых сообщений.</p>
    <?php endif; ?>
</body>

</html>