<?php

require_once("../connect.php");

session_start();

$sql = "SELECT * FROM orders WHERE in_progress = 1";
$stmt = $db->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Passer une commande</title>
</head>

<body>
    <h1>Gestion des commandes</h1>
    <?php if ($orders): ?>
    <div id="orders"><?php echo htmlspecialchars($orders); ?></div>
    <?php endif; ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom de l'utilisateur</th>
            <th>Email</th>
            <th>Date de commande</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>En attente</th>
            <th>En cours</th>
            <th>Approuvé</th>
        </tr>
        <?php if (count($orders) > 0): ?>
        <?php foreach ($orders as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['date_order']); ?></td>
            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
            <td><?php echo $row['pending'] ? 'Oui' : 'Non'; ?></td>
            <td><?php echo $row['in_progress'] ? 'Oui' : 'Non'; ?></td>
            <td><?php echo $row['approved'] ? 'Oui' : 'Non'; ?></td>
            <td>
                <form action="edit_order.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <select name="status">
                        <option value="pending">En attente</option>
                        <option value="in_progress">En cours</option>
                        <option value="approved">Approuvé</option>
                        <option value="rejected">Rejeté</option>
                    </select>
                    <button type="submit">Mettre à jour</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="9">Aucune commande en cours</td>
        </tr>
        <?php endif; ?>
    </table>

</body>

</html>