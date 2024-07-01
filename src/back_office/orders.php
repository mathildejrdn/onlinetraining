<?php

require_once("../connect.php");

session_start();

$sql = "SELECT * FROM orders WHERE status";
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
    <?php if (isset($_SESSION['orders'])): ?>
    <p><?php echo htmlspecialchars($_SESSION['orders']); ?></p>
    <?php unset($_SESSION['orders']); ?>
    <?php endif; ?>
    <table>
        <tr>
            <th>Numéro de commande</th>
            <th>Nom de l'utilisateur</th>
            <th>Email</th>
            <th>Date de commande</th>
            <th>Produit</th>
            <th>Quantité</th>
        </tr>
        <?php if (count($orders) > 0): ?>
        <?php foreach ($orders as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
            <td><?php echo htmlspecialchars($row['user_name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['date_order']); ?></td>
            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
            <td>
                <form action="orders.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['user_id']); ?>">
                    <select name="status">
                        <option value="pending" <?php if ($row['status'] === 'pending') echo 'selected'; ?>>En attente
                        </option>
                        <option value="in_progress" <?php if ($row['status'] === 'in_progress') echo 'selected'; ?>>En
                            cours</option>
                        <option value="approved" <?php if ($row['status'] === 'approved') echo 'selected'; ?>>Approuvé
                        </option>
                        <option value="reject" <?php if ($row['status'] === 'reject') echo 'selected'; ?>>Rejeté
                        </option>
                    </select>
                    <button type="submit">Mettre à jour</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="8">Aucune commande en cours</td>
        </tr>
        <?php endif; ?>
    </table>

</body>

</html>