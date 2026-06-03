<?php
require_once 'db.php';

$id = $_GET['id'] ?? 0;
$sql = "DELETE FROM items WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
header('Location: index.php');
exit;
?>

<head>
    <link rel="stylesheet" href="style.css">
</head>