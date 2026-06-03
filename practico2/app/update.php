<?php
require_once 'db.php';

$id = $_GET['id'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $sql = "UPDATE items SET name = :name, description = :desc WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'desc' => $desc, 'id' => $id]);
    header('Location: index.php');
    exit;
}

$sql = "SELECT * FROM items WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$item) { die("Ítem no encontrado"); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Ítem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Ítem</h1>
    <form method="post">
        <label>Nombre:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required><br><br>
        <label>Descripción:</label><br>
        <textarea name="description" required><?= htmlspecialchars($item['description']) ?></textarea><br><br>
        <input type="submit" value="Actualizar">
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>