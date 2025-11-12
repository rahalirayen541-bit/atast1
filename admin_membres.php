<?php
require_once 'config.php';

// Vérifier l'accès admin (à sécuriser selon vos besoins)
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

try {
    $pdo = connectDB();
    $stmt = $pdo->query("SELECT * FROM membres ORDER BY date_inscription DESC");
    $membres = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des membres - ATAST Club</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #667eea; color: white; }
        tr:hover { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Gestion des membres ATAST Club</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Niveau</th>
                <th>CIN</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Date d'inscription</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membres as $membre): ?>
            <tr>
                <td><?= htmlspecialchars($membre['id']) ?></td>
                <td><?= htmlspecialchars($membre['nom']) ?></td>
                <td><?= htmlspecialchars($membre['prenom']) ?></td>
                <td><?= htmlspecialchars($membre['niveau']) ?></td>
                <td><?= htmlspecialchars($membre['cin']) ?></td>
                <td><?= htmlspecialchars($membre['telephone']) ?></td>
                <td><?= htmlspecialchars($membre['email']) ?></td>
                <td><?= htmlspecialchars($membre['date_inscription']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>