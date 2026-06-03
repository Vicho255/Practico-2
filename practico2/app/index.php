<?php
require_once 'db.php';

$sql = "SELECT * FROM items ORDER BY id DESC";
$stmt = $pdo->query($sql);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD con Docker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestión de Ítems</h1>
    <nav>
        <a href="create.php">➕ Crear nuevo ítem</a>
        <a href="index.php">📋 Ver todos</a>
    </nav>
    <h2>Lista de ítems</h2>
    <table>
        <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Acciones</th></tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['id']) ?></td>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= htmlspecialchars($item['description']) ?></td>
            <td>
                <a href="update.php?id=<?= $item['id'] ?>">✏️ Editar</a>
                <a href="delete.php?id=<?= $item['id'] ?>" onclick="return confirm('¿Eliminar?')">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>