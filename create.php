<!-- Add a new product -->
<?php
include 'db.php';
/* @var $pdo PDO */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    
    // Validate inputs
    if (empty($name) || $price <= 0) {
        echo "<div class='alert alert-danger'>Please enter valid product information.</div>";
    } else {
        // Insert new product into database
        $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }
}
?>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Add Product</h1>
    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>