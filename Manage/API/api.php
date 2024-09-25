<?php
// api.php
require 'config.php';
require 'routes.php';

// Get HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// Get the request path
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

// Handle the request
$response = handleRequest($request, $method);

// Return the response
echo $response;
?>
