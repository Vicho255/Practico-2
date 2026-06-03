<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $desc = $_POST['description'] ?? '';
    if ($name && $desc) {
        $sql = "INSERT INTO items (name, description) VALUES (:name, :desc)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'desc' => $desc]);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Ítem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Nuevo Ítem</h1>
    <form method="post">
        <label>Nombre:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Descripción:</label><br>
        <textarea name="description" required></textarea><br><br>
        <input type="submit" value="Guardar">
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>