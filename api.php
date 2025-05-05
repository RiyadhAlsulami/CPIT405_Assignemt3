<?php
// API to fetch products from the database and return as JSON response
include 'db.php';
/* @var $pdo PDO */

header('Content-Type: application/json');

try {
    // Fetch all products from the database
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the products as JSON response
    echo json_encode([
        'status' => 'success',
        'data' => $products
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}