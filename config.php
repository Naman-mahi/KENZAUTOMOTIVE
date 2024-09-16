<?php
// Define the environment
$environment = getenv('APP_ENV') ?: 'development'; // Default to 'development' if not set

// Define the base URL constant based on the environment
if ($environment === 'production') {
    define('BASE_URL', 'https://yourdomain.com/');
} else {
    define('BASE_URL', 'http://localhost/kenzautomotive/');
}
?>
