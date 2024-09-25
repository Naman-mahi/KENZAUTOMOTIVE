<?php
// routes.php
require '../../includes/db.php';
require 'resources/ProductResource.php';

function handleRequest($request, $method) {
    global $conn;

    // Get the resource and ID (if any)
    $resource = $request[0];
    $id = isset($request[1]) ? (int)$request[1] : null;

    switch ($resource) {
        case 'products':
            $resourceClass = new ProductResource($conn);
            break;
        // Add more resources here as needed
        default:
            return json_encode(['message' => 'Resource not found']);
    }

    // Call the appropriate method based on the HTTP method
    switch ($method) {
        case 'GET':
            return json_encode($resourceClass->get($id));
        case 'POST':
            $input = json_decode(file_get_contents('php://input'), true);
            return json_encode($resourceClass->post($input));
        case 'PUT':
            $input = json_decode(file_get_contents('php://input'), true);
            return json_encode($resourceClass->put($id, $input));
        case 'DELETE':
            return json_encode($resourceClass->delete($id));
        default:
            return json_encode(['message' => 'Method not allowed']);
    }
}
?>
