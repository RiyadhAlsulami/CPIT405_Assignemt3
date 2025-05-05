<?php
// Delete a product by ID
include 'db.php';
/* @var $pdo PDO */

// Validate the ID parameter
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Invalid ID, redirect back to index
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

// Delete the product from the database
$stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

header("Location: index.php");
exit();