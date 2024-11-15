<?php
// Define the environment
$environment = getenv('APP_ENV') ?: 'development'; // Default to 'development' if not set

defined('API_BASE_URL') || define('API_BASE_URL', 'https://api.intencode.com/'); // Default to production API base URL
defined('ProductThumbnail') || define('ProductThumbnail', 'https://kenzwheels.com/marketplace/Manage/uploads/ProductThumbnail/'); // Default to production product thumbnail URL
defined('ProductImages') || define('ProductImages', 'https://kenzwheels.com/marketplace/Manage/uploads/ProductImages/'); // Default to production product images URL
defined('BrandLogo') || define('BrandLogo', 'https://kenzwheels.com/marketplace/Manage/uploads/BrandLogo/'); // Default to production brand logo URL
defined('BannerImageUrl') || define('BannerImageUrl', 'https://kenzwheels.com/marketplace/Manage/uploads/Banners/'); // Default to production banner images URL

// Define the base URL constant based on the environment
if ($environment === 'production') {
    define('BASE_URL', 'https://kenzmarketplace.com/');
} else {
    define('BASE_URL', 'http://192.168.1.7/Kenzwheels/KENZAUTOMOTIVE/');
}
?>
