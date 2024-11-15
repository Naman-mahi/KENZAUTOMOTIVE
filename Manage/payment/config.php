<?php
// Cashfree API Configuration
define('CF_APP_ID', 'Your Key');
define('CF_SECRET_KEY', 'Your Key');
define('CF_API_VERSION', '2023-08-01');
define('CF_MODE', 'TEST'); // TEST or PROD

// API Endpoints
define('CF_TEST_URL', 'https://test.cashfree.com/billpay/checkout/post/submit');
define('CF_PROD_URL', 'https://www.cashfree.com/checkout/post/submit');
define('CF_API_TEST_URL', 'https://sandbox.cashfree.com/pg');
define('CF_API_PROD_URL', 'https://api.cashfree.com/pg');

// Default Currency
define('CF_CURRENCY', 'INR');

// Return URLs
define('CF_RETURN_URL', 'http://localhost/cashfree/checkout/response.php');
define('CF_NOTIFY_URL', 'http://localhost/cashfree/checkout/callback.php');

?>