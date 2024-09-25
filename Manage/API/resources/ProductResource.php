<?php
// resources/ProductResource.php
require_once 'BaseResource.php';

class ProductResource extends BaseResource {

    public function get($id = null) {
        if ($id) {
            $stmt = $this->conn->prepare("SELECT * FROM products WHERE product_id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc() ?: ['message' => 'Product not found'];
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM products");
            $stmt->execute();
            $result = $stmt->get_result();
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
        }
    }

    public function post($data) {
        $stmt = $this->conn->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
        $stmt->bind_param('sd', $data['name'], $data['price']);
        if ($stmt->execute()) {
            return ['message' => 'Product created', 'id' => $this->conn->insert_id];
        } else {
            return ['message' => 'Failed to create product', 'error' => $stmt->error];
        }
    }

    public function put($id, $data) {
        $stmt = $this->conn->prepare("UPDATE products SET name = ?, price = ? WHERE product_id = ?");
        $stmt->bind_param('sdi', $data['name'], $data['price'], $id);
        if ($stmt->execute()) {
            return ['message' => 'Product updated'];
        } else {
            return ['message' => 'Failed to update product', 'error' => $stmt->error];
        }
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE product_id = ?");
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            return ['message' => 'Product deleted'];
        } else {
            return ['message' => 'Failed to delete product', 'error' => $stmt->error];
        }
    }
}
?>
