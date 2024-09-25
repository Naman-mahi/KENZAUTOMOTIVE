<?php
// api.php
require 'config.php';

// Get HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// Get the request path
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

// Route based on the method and endpoint
switch ($method) {
    case 'GET':
        if (isset($request[0]) && $request[0] === 'products') {
            // Fetch all products
            $stmt = $conn->prepare("SELECT * FROM products");
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($products);
        } else {
            echo json_encode(['message' => 'Endpoint not found']);
        }
        break;

    case 'POST':
        if (isset($request[0]) && $request[0] === 'products') {
            // Create a new product
            $input = json_decode(file_get_contents('php://input'), true);
            $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
            $stmt->bindParam(':name', $input['name']);
            $stmt->bindParam(':price', $input['price']);
            $stmt->execute();
            echo json_encode(['message' => 'Product created', 'id' => $conn->lastInsertId()]);
        } else {
            echo json_encode(['message' => 'Endpoint not found']);
        }
        break;

    case 'PUT':
        if (isset($request[0]) && $request[0] === 'products' && isset($request[1])) {
            // Update a product
            $input = json_decode(file_get_contents('php://input'), true);
            $stmt = $conn->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
            $stmt->bindParam(':name', $input['name']);
            $stmt->bindParam(':price', $input['price']);
            $stmt->bindParam(':id', $request[1]);
            $stmt->execute();
            echo json_encode(['message' => 'Product updated']);
        } else {
            echo json_encode(['message' => 'Endpoint not found']);
        }
        break;

    case 'DELETE':
        if (isset($request[0]) && $request[0] === 'products' && isset($request[1])) {
            // Delete a product
            $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(':id', $request[1]);
            $stmt->execute();
            echo json_encode(['message' => 'Product deleted']);
        } else {
            echo json_encode(['message' => 'Endpoint not found']);
        }
        break;

    default:
        echo json_encode(['message' => 'Method not allowed']);
        break;
}
?>
