<?php
// Define the environment
$environment = getenv('APP_ENV') ?: 'development'; // Default to 'development' if not set

// Define the base URL constant based on the environment
if ($environment === 'production') {
    define('BASE_URL', 'https://kenzmarketplace.com/');
} else {
    define('BASE_URL', 'http://192.168.1.5/marketplace/');
}
?>
