-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 05:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `image`, `link`, `start_datetime`, `end_datetime`, `created_at`, `updated_at`) VALUES
(1, 'Winter Sale', 'Get up to 50% off on winter clothing!', 'banner-advertisement.jpg', 'http://example.com/winter-sale', '2024-10-16 09:00:00', '2024-10-16 12:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(2, 'New Year Party', 'Join us for a night of fun and celebration!', 'banner-advertisement.jpg', 'http://example.com/new-year-party', '2024-10-16 12:00:00', '2024-10-16 15:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(3, 'Summer Collection', 'Check out our latest summer styles.', 'banner-advertisement.jpg', 'http://example.com/summer-collection', '2024-10-16 15:00:00', '2024-10-16 18:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(4, 'Flash Sale', 'Hurry! Limited time offer on selected items!', 'banner-advertisement.jpg', 'http://example.com/flash-sale', '2024-10-16 18:00:00', '2024-10-16 19:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(5, 'Holiday Discounts', 'Exclusive discounts for the holiday season.', 'banner-advertisement.jpg', 'http://example.com/holiday-discounts', '2024-10-16 19:00:00', '2024-10-16 21:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(6, 'Weekend Special', 'Enjoy 30% off this weekend only!', 'banner-advertisement.jpg', 'http://example.com/weekend-special', '2024-10-17 09:00:00', '2024-10-17 11:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(7, 'Back to School', 'Get ready for school with great deals!', 'banner-advertisement.jpg', 'http://example.com/back-to-school', '2024-10-17 11:00:00', '2024-10-17 14:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(8, 'Valentine’s Day', 'Make this Valentine’s special with our gifts.', 'banner-advertisement.jpg', 'http://example.com/valentines-day', '2024-10-17 14:00:00', '2024-10-17 17:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(9, 'Tech Extravaganza', 'Discover the latest gadgets at discounted prices.', 'banner-advertisement.jpg', 'http://example.com/tech-extravaganza', '2024-10-17 17:00:00', '2024-10-17 20:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(10, 'End of Season Clearance', 'Last chance to grab your favorites!', 'banner-advertisement.jpg', 'http://example.com/end-of-season', '2024-10-17 20:00:00', '2024-10-17 23:00:00', '2024-10-16 10:09:40', '2024-10-16 10:10:12'),
(11, 'testing', 'testing', 'uploads/advertisements/670f94c0e6279-413d6bbe8e_20241003_091218.jpeg', 'https://kenz-innovations-web-app.vercel.app/', '2024-10-30 15:55:00', '2024-10-31 15:55:00', '2024-10-16 10:26:08', '2024-10-16 10:26:08'),
(12, '334', 'fdfdf', '670f96caaec6b-413d6bbe8e_20241003_091218.jpeg', '454543', '2024-10-02 16:04:00', '2024-10-10 16:04:00', '2024-10-16 10:34:50', '2024-10-16 10:34:50'),
(13, 'Testing', 'Testing', '670f9cbe35704-413d6bbe8e_20241003_091218.jpeg', 'fdfdfd', '2024-10-18 03:34:00', '2024-10-22 16:29:00', '2024-10-16 11:00:14', '2024-10-16 11:00:14'),
(14, 'fsf', 'sfsf', '6718b45822fef-nissan-logo.png', 'sfsfsf', '2024-10-23 14:00:00', '2024-10-30 14:00:00', '2024-10-23 08:31:20', '2024-10-23 08:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Summer Sale', '8218404.jpg', 'https://example.com/summer-sale', 'active', '2024-10-30 09:58:29', '2024-10-30 10:14:41'),
(2, 'Winter Collection', '9123189.jpg', 'https://example.com/winter-collection', 'active', '2024-10-30 09:58:29', '2024-10-30 10:15:01'),
(3, 'Flash Deals', 'rrggeggs4535553.jpg', 'https://example.com/flash-deals', 'active', '2024-10-30 09:58:29', '2024-10-30 10:15:24'),
(4, 'New Arrivals', 'new-arrivals.jpg', 'https://example.com/new-arrivals', 'inactive', '2024-10-30 09:58:29', '2024-10-30 10:15:32'),
(5, 'Holiday Specials', 'holiday-specials.jpg', 'https://example.com/holiday-specials', 'inactive', '2024-10-30 09:58:29', '2024-10-30 09:58:29'),
(6, 'Testing', '20241105_080308-6729c32caf6c2.jpg', 'dggdfg', 'active', '2024-11-05 07:03:08', '2024-11-05 07:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_logo`, `category_id`, `created_date`) VALUES
(1, 'Audi', 'audi-logo.png', 2, '2024-10-18'),
(2, 'BMW', 'bmw-logo.png', 2, '2024-10-18'),
(3, 'Dodge', 'dodge-logo.png', 2, '2024-10-18'),
(4, 'Ford', 'ford-logo.png', 2, '2024-10-18'),
(5, 'Honda', 'honda-logo.png', 2, '2024-10-18'),
(6, 'Hyundai 2011', 'hyundai-logo-2011-640.png', 2, '2024-10-18'),
(7, 'Hyundai', 'hyundai-logo.png', 2, '2024-10-18'),
(8, 'Jeep', 'jeep-logo.png', 2, '2024-10-18'),
(9, 'Kia', 'kia-logo.png', 2, '2024-10-18'),
(10, 'KTM', 'ktm-logo.png', 2, '2024-10-18'),
(11, 'Mahindra', 'mahindra-logo.png', 2, '2024-10-18'),
(12, 'Nissan', 'nissan-logo.png', 2, '2024-10-18'),
(13, 'Porsche', 'porsche-logo.png', 2, '2024-10-18'),
(14, 'Subaru', 'subaru-logo.png', 2, '2024-10-18'),
(15, 'Suzuki', 'suzuki-logo.png', 2, '2024-10-18'),
(16, 'Tata', 'tata-logo.png', 2, '2024-10-18'),
(17, 'Toyota', 'toyota-logo.png', 2, '2024-10-18'),
(18, 'Volvo', 'volvo-logo.png', 2, '2024-10-18'),
(19, 'Testingfgfg', '6711de99b8cd3-logo.jpg', 2, '2024-10-18'),
(20, 'fdfd', '6711dc2279b6e-20276418.png', 3, '2024-10-18'),
(21, 'testing', '6711deae88a3c-logo.jpg', 2, '2024-10-18'),
(22, 'Testingerewrwerw', '6718aec10714a-nissan-logo.png', 2, '2024-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `created_at`) VALUES
(1, 'Vehicles', '2024-09-23 04:11:26'),
(2, 'Cars', '2024-09-23 04:11:26'),
(3, 'Bikes', '2024-09-23 04:11:26'),
(4, 'Spare Parts', '2024-09-23 04:11:26'),
(5, 'Real Estate', '2024-09-23 04:11:26'),
(6, 'Houses', '2024-09-23 04:11:26'),
(7, 'Apartments', '2024-09-23 04:11:26'),
(8, 'Electronics', '2024-09-23 04:11:26'),
(9, 'Computers', '2024-09-23 04:11:26'),
(10, 'Mobiles', '2024-09-23 04:11:26'),
(11, 'Medical Equipment', '2024-09-23 04:11:26'),
(12, 'Medical Supplies', '2024-09-23 04:11:26'),
(13, 'Home Appliances', '2024-09-23 04:11:26'),
(14, 'Kitchen Appliances', '2024-09-23 04:11:26'),
(15, 'Entertainment', '2024-09-23 04:11:26'),
(16, 'Televisions', '2024-09-23 04:11:26'),
(17, 'testing', '2024-10-03 05:41:49'),
(18, 'testing 1', '2024-10-03 05:42:15'),
(19, 'tesdddd', '2024-10-23 08:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` text NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount_type` enum('fixed','percentage') NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `expiration_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_name`, `code`, `discount_type`, `discount_value`, `expiration_date`, `status`, `created_at`) VALUES
(1, 'Spring Sale', 'SPRING2024', 'percentage', 20.00, '2024-05-01 00:00:00', 'active', '2024-01-15 04:30:00'),
(2, 'Summer Discount', 'SUMMER2024', 'fixed', 15.00, '2024-08-15 00:00:00', 'active', '2024-01-16 05:30:00'),
(3, 'Winter Savings', 'WINTER2024', 'percentage', 30.00, '2024-12-31 00:00:00', 'inactive', '2024-01-17 06:30:00'),
(4, 'Fall Special', 'FALL2024', 'fixed', 10.00, '2024-11-30 00:00:00', 'active', '2024-01-18 07:30:00'),
(5, 'New Year Offer', 'NEWYEAR2024', 'percentage', 25.00, '2024-01-15 00:00:00', 'active', '2024-01-19 08:30:00'),
(6, 'Black Friday Deal', 'BLACKFRIDAY2024', 'fixed', 50.00, '2024-11-25 00:00:00', 'active', '2024-01-20 09:30:00'),
(7, 'Cyber Monday Sale', 'CYBERMONDAY2024', 'fixed', 35.00, '2024-11-30 00:00:00', 'active', '2024-01-21 10:30:00'),
(8, 'Valentine Discount', 'VALENTINE2024', 'fixed', 20.00, '2024-02-14 00:00:00', 'active', '2024-01-22 11:30:00'),
(9, 'Easter Special', 'EASTER2024', 'percentage', 15.00, '2024-04-01 00:00:00', 'active', '2024-01-23 12:30:00'),
(10, 'Labor Day Offer', 'LABORDAY2024', 'fixed', 30.00, '2024-09-01 00:00:00', 'active', '2024-01-24 13:30:00'),
(11, 'Testing update', '85201AAA', 'fixed', 20.00, '2024-10-10 00:00:00', 'inactive', '2024-10-14 10:57:11'),
(12, 'trtrtre', '45tete', 'percentage', 0.00, '2024-10-16 13:44:00', 'active', '2024-10-23 08:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `dealer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pan_number` varchar(20) DEFAULT NULL,
  `gst_number` varchar(25) DEFAULT NULL,
  `document_upload` text DEFAULT NULL,
  `verification_status` enum('Pending','Verified','Rejected','Suspended','Inactive','Active') NOT NULL DEFAULT 'Pending',
  `verification_note` text DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`dealer_id`, `user_id`, `product_category_id`, `company_name`, `contact_person`, `phone_number`, `email`, `address_line1`, `address_line2`, `city`, `state`, `postal_code`, `country`, `created_at`, `updated_at`, `pan_number`, `gst_number`, `document_upload`, `verification_status`, `verification_note`, `created_date`) VALUES
(1, 1, 2, 'ABC Motors', 'Rajesh Kumar', '9876543210', 'rajesh.kumar@abcmotors.com', '123 MG Road', 'Near City Mall', 'Mumbai', 'Maharashtra', '400001', 'India', '2024-09-23 04:27:25', '2024-09-23 04:27:25', NULL, NULL, NULL, 'Pending', NULL, '2024-10-07 09:51:40'),
(2, 4, 3, 'XYZ Bikes', 'Anjali Singh', '8765432109', 'anjali.singh@xyzbikes.com', '456 Ashoka Nagar', NULL, 'Bengaluru', 'Karnataka', '560001', 'India', '2024-09-23 04:27:25', '2024-09-23 04:27:25', NULL, NULL, NULL, 'Pending', NULL, '2024-10-07 09:51:40'),
(3, 5, 5, 'House Deals India', 'Vikram Rao', '7654321098', 'vikram.rao@housedeals.com', '789 MG Road', 'Opposite Park', 'Delhi', 'Delhi', '110001', 'India', '2024-09-23 04:27:25', '2024-09-23 04:27:25', NULL, NULL, NULL, 'Pending', NULL, '2024-10-07 09:51:40'),
(4, 6, 7, 'Techie Gadgets', 'Pooja Mehta', '6543210987', 'pooja.mehta@techiegadgets.com', '321 Nehru St', 'Near Railway Station', 'Chennai', 'Tamil Nadu', '600001', 'India', '2024-09-23 04:27:25', '2024-09-23 04:27:25', NULL, NULL, NULL, 'Pending', NULL, '2024-10-07 09:51:40'),
(5, 7, 8, 'Electro World', 'Rahul Sharma', '5432109876', 'rahul.sharma@electroworld.com', '654 Gandhi Rd', 'Next to Bus Stand', 'Hyderabad', 'Telangana', '500001', 'India', '2024-09-23 04:27:25', '2024-09-23 04:27:25', NULL, NULL, NULL, 'Pending', NULL, '2024-10-07 09:51:40'),
(7, 17, 13, 'Intencode', 'Naman', '8546123097', 'naman.intelcode@gmail.com', 'Amuritha Arcade', 'Kacheguda', 'India', 'maharahstra', '520132', '854612', '2024-10-01 06:10:34', '2024-10-01 06:10:34', '0552fdfdsf', 'dggfdgddgdfgdf', '64371cbad86b2c8d3b8fe4d5_invoice-lp-click-to-edit.png', 'Pending', NULL, '2024-10-07 09:51:40'),
(8, 18, 4, 'Intencode India', 'Farooq', '854612300', 'skhobragade993@gmail.com', '8546120', '32021200', 'Hyderabd', 'Telangana', '852100', 'India', '2024-10-01 08:29:07', '2024-10-07 07:16:07', 'WE234ERRRE', '545GFGFG343DFFDSF', '1fd556c131_20241002_061813.jpg,1e4a0ed47c_20241002_061813.png,a970565dd4_20241002_061813.jpeg,fb635efb9b_20241002_061813.jpeg', 'Rejected', 'testing', '2024-10-07 09:51:40'),
(11, 19, 4, 'Intencode India', 'Farooq Nwas', '8794563210', 'info@Intencde.com', '24', 'Amrutha Arcode', 'Hyderabd', 'Tel', '500270', 'India', '2024-10-03 07:09:37', '2024-10-07 07:15:41', '58WSSSS22', '36WE58WSSSSS22', '413d6bbe8e_20241003_091218.jpeg,fe1d556032_20241003_091218.pdf,502d813689_20241003_091218.jpg,3dcb17b7e9_20241003_091218.png', '', 'gfgd', '2024-10-07 09:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `quantity`, `last_updated`) VALUES
(1, 7, 20, '2024-10-21 06:34:19'),
(2, 8, 30, '2024-10-21 06:34:19'),
(3, 9, 30, '2024-10-21 06:34:19'),
(4, 10, 30, '2024-10-21 06:34:19'),
(5, 11, 12, '2024-10-21 06:34:19'),
(6, 12, 50, '2024-11-05 08:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','shipped','delivered','canceled') NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'User Management', 'Manage users and their roles.'),
(2, 'Onboarding Dealers', 'Onboard new dealers into the system.'),
(3, 'Coupons Management', 'Create and manage coupons.'),
(4, 'Ads Management', 'Manage advertisements.'),
(5, 'Sales Agent Management', 'Manage sales agents.'),
(6, 'Categories Management', 'Manage product categories.'),
(7, 'Brands Management', 'Manage product brands.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `dealer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `color` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_condition` enum('new','old') NOT NULL,
  `top_features` text DEFAULT NULL,
  `stand_out_features` text DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `inspection_request` int(5) DEFAULT NULL,
  `inspection_status` enum('Pending','Completed','Cancel') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `dealer_id`, `category_id`, `brand_id`, `product_name`, `product_description`, `price`, `color`, `product_image`, `product_condition`, `top_features`, `stand_out_features`, `is_featured`, `inspection_request`, `inspection_status`, `created_at`, `updated_at`) VALUES
(3, 1, 7, NULL, 'fffdf', 'dsfsfdsf', 520.00, 'Red, Blue. Black', 'car-1.jpg', 'new', 'To display YouTube, Vimeo and Wistia, videos, you just need to paste the video URL, or share URL of the video in the data-src attribute. The same way you display images in the gallery. lightGallery will check the data-src attribute and if it is a video URL, it will create the respective video slide.', 'You can also provide poster image for each videos. Poster images will be loaded instead of videos. So user will be able to navigate to other slides by using mouse drag or swipe. Poster images improve performance, and maintain the flexibility of your gallery without effecting user experience. Videos will be loaded when a user clicks on the poster images. You can place poster image url in the data-poster attribute.', NULL, NULL, 'Pending', '2024-09-24 05:26:39', '2024-10-18 04:19:01'),
(4, 6, 3, NULL, 'dfdfsdf', 'dfsdfdsf', 20.00, 'Purple Gold, yellow, Pink', 'car-4.jpg', 'new', 'You can also provide poster image for each videos. Poster images will be loaded instead of videos. So user will be able to navigate to other slides by using mouse drag or swipe. Poster images improve performance, and maintain the flexibility of your gallery without effecting user experience. Videos will be loaded when a user clicks on the poster images. You can place poster image url in the data-poster attribute.', 'To display YouTube, Vimeo and Wistia, videos, you just need to paste the video URL, or share URL of the video in the data-src attribute. The same way you display images in the gallery. lightGallery will check the data-src attribute and if it is a video URL, it will create the respective video slide.', NULL, NULL, 'Pending', '2024-09-24 05:26:39', '2024-10-18 04:18:11'),
(5, 1, 1, NULL, 'testing', 'Description', 850.00, NULL, 'car-6.jpg', 'new', 'good', 'Not bad', NULL, NULL, 'Pending', '2024-10-03 06:50:55', '2024-10-18 04:18:17'),
(6, 1, 1, NULL, 'testing', 'Description', 850.00, NULL, 'car-7.jpg', 'new', 'good', 'Not bad', NULL, NULL, 'Pending', '2024-10-03 06:54:52', '2024-10-18 04:18:24'),
(7, 1, 4, NULL, 'Testing', 'testing', 52200.00, NULL, 'car-8.jpg', 'new', 'Testing', 'Testing', NULL, NULL, 'Pending', '2024-10-03 06:56:55', '2024-10-21 06:11:13'),
(8, 1, 1, NULL, 'Testing', 'testing', 52200.00, NULL, 'car-9.jpg', 'new', 'Testing', 'Testing', NULL, NULL, 'Pending', '2024-10-03 06:58:23', '2024-10-18 04:18:35'),
(9, 1, 2, NULL, 'testing1223', '2562', 1230.00, '20', '6715e488037bb_nissan-logo.png', 'new', 'gfdgfd', 'fgdfg', NULL, NULL, 'Pending', '2024-10-21 05:20:08', '2024-10-21 06:17:06'),
(10, 1, 2, NULL, '123', '65266', 123.00, '123,123,2523', '6715e513242c6_subaru-logo.png', 'new', 'dfsdfs', 'fdsfds', NULL, NULL, 'Pending', '2024-10-21 05:22:27', '2024-10-21 05:22:27'),
(11, 1, 2, NULL, 'dfdsfsd', 'fsfsdf', 545435.00, 'dfd,fggd', 'product_20241021072359_6715e56f7b6c5.png', 'old', 'fdgdf', 'fdgfdg', NULL, NULL, 'Pending', '2024-10-21 05:23:59', '2024-10-21 05:23:59'),
(12, 1, 2, NULL, '855220', '2525', 300.00, '233,656', 'product_20241021082158_6715f306c634e.jpg', 'new', '5526', '52826', 1, NULL, 'Pending', '2024-10-21 06:21:58', '2024-11-05 08:51:16'),
(13, 1, 2, NULL, 'Testing', 'Others who use this device won’t see your activity, so you can browse more privately. This won\'t change how data is collected by websites you visit and the services they use, including Google. Downloads, bookmarks and reading list items will be saved. Learn more\r\n\r\nChrome won’t save:\r\nYour browsing history\r\nCookies and site data\r\nInformation entered in forms\r\nYour activity might still be visible to:\r\nWebsites you visit\r\nYour employer or school\r\nYour internet service provider', 522222.00, 'blue, red, black', 'mahindra-logo.png', 'new', 'Testing', '102030100', 1, 1, 'Pending', '2024-10-21 06:22:45', '2024-11-07 04:10:31'),
(14, 6, 2, NULL, 'Tata Curvv', 'The Tata Curvv is a 5-seater SUV-coupe, priced from Rs 10 lakh (ex-showroom). The Curvv features a distinctive SUV-coupe design with a sloping roofline that helps it stand out in the crowded compact SUV segment in India. It is available in four broad variants, offering three engine options and a choice between manual and automatic transmissions. There is an electric version of the Curvv too, which comes at a higher price tag.', 1000000.00, 'Blue, White,Red', 'front-left-side-47.webp', 'new', 'Automatic Climate Control\r\nParking Sensors\r\nCruise Control\r\nSunroof\r\nAdvanced Internet Features\r\nHeight Adjustable Driver Seat\r\nDrive Modes\r\n360 Degree Camera\r\nVentilated Seats\r\nAir Purifier\r\nBlind Spot Camera\r\nADAS', 'Blind view monitoring display can be had on the touchscreen or instrument cluster\r\n\r\nTata Curvv Powered tailgate with gesture function allows for easy opening/closing of the boot\r\nPowered tailgate with gesture function allows for easy opening/closing of the boot\r\n\r\nTata Curvv Level 2 ADAS available on top variants, very well tuned for Indian driving conditions\r\nLevel 2 ADAS available on top variants, very well tuned for Indian driving conditions', NULL, NULL, 'Pending', '2024-10-25 09:51:45', '2024-10-25 09:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `pf_id` int(11) NOT NULL,
  `category_id` int(50) NOT NULL,
  `pf_name` varchar(255) NOT NULL,
  `pf_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pf_updated_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`pf_id`, `category_id`, `pf_name`, `pf_created_date`, `pf_updated_date`) VALUES
(1, 7, 'Square Footage', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(2, 7, 'Number of Bedrooms', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(3, 7, 'Number of Bathrooms', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(4, 7, 'Floor Level', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(5, 7, 'Amenities', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(6, 7, 'Monthly Rent', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(7, 7, 'Deposit Amount', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(8, 7, 'Pet Policy', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(9, 7, 'Parking Spaces', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(10, 3, 'Engine Size (CC)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(11, 3, 'Mileage (MPG)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(12, 3, 'Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(13, 3, 'Weight (kg)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(14, 3, 'Number of Gears', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(15, 3, 'Fuel Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(16, 3, 'Color', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(17, 3, 'Brake Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(18, 3, 'Frame Material', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(19, 2, 'Mileage (MPG)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(20, 2, 'Engine Power (HP)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(21, 2, 'Number of Doors', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(22, 2, 'Fuel Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(24, 2, 'Transmission Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(25, 2, 'Tire Size', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(26, 2, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(27, 2, 'Safety Rating', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(28, 9, 'RAM (GB)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(29, 9, 'Storage (GB)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(30, 9, 'Processor Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(31, 9, 'Graphics Card', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(32, 9, 'Operating System', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(33, 9, 'Screen Size (inches)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(34, 9, 'Weight (kg)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(35, 9, 'Battery Life (hours)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(36, 9, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(37, 8, 'Power Consumption (W)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(38, 8, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(39, 8, 'Screen Size (inches)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(40, 8, 'Connectivity Options', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(41, 8, 'Weight (kg)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(42, 8, 'Resolution', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(43, 8, 'Audio Output', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(44, 8, 'Battery Life (hours)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(45, 15, 'Genre', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(46, 15, 'Format', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(47, 15, 'Duration (minutes)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(48, 15, 'Age Rating', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(49, 15, 'Director', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(50, 15, 'Release Year', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(51, 15, 'Cast', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(52, 15, 'Language', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(53, 13, 'Power Consumption (W)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(54, 13, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(55, 13, 'Energy Efficiency Rating', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(56, 13, 'Size/Capacity', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(57, 13, 'Material', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(58, 13, 'Color', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(59, 13, 'Noise Level (dB)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(60, 6, 'Square Footage', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(61, 6, 'Number of Bedrooms', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(62, 6, 'Number of Bathrooms', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(63, 6, 'Lot Size (acres)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(64, 6, 'Year Built', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(65, 6, 'Property Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(66, 6, 'Heating Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(67, 6, 'Cooling Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(68, 14, 'Power Consumption (W)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(69, 14, 'Capacity (L)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(70, 14, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(71, 14, 'Energy Efficiency Rating', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(72, 14, 'Material', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(73, 14, 'Color', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(74, 14, 'Dimensions (cm)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(75, 11, 'Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(76, 11, 'Power Supply', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(77, 11, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(78, 11, 'Calibration Frequency', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(79, 11, 'User Manual', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(80, 11, 'Weight (kg)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(81, 11, 'Operating Temperature', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(82, 12, 'Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(83, 12, 'Expiry Date', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(84, 12, 'Packaging Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(85, 12, 'Material', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(86, 12, 'Size', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(87, 10, 'Screen Size (inches)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(88, 10, 'RAM (GB)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(89, 10, 'Storage (GB)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(90, 10, 'Camera Quality (MP)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(91, 10, 'Battery Capacity (mAh)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(92, 10, 'Operating System', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(93, 10, 'Color', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(94, 10, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(95, 5, 'Property Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(96, 5, 'Square Footage', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(97, 5, 'Number of Bedrooms', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(98, 5, 'Number of Bathrooms', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(99, 5, 'Year Built', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(100, 5, 'Lot Size', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(101, 5, 'Zoning Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(102, 4, 'Compatibility', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(103, 4, 'Material', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(104, 4, 'Weight', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(105, 4, 'Warranty Period (years)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(106, 4, 'Manufacturer', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(107, 4, 'Part Number', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(108, 16, 'Screen Size (inches)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(109, 16, 'Resolution', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(110, 16, 'Smart TV', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(111, 16, 'HDMI Ports', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(112, 16, 'Weight (kg)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(113, 16, 'Refresh Rate (Hz)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(114, 16, 'Audio Output', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(115, 1, 'Mileage (MPG)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(116, 1, 'Engine Power (HP)', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(117, 1, 'Fuel Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(118, 1, 'Number of Doors', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(119, 1, 'Color', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(120, 1, 'Transmission Type', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(121, 1, 'Safety Features', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(122, 7, 'testing', '2024-10-03 06:26:11', '2024-10-03 11:56:11'),
(123, 7, 'Property Type', '2024-10-03 06:34:16', '2024-10-03 12:04:16'),
(124, 19, 'ytytyt', '2024-10-23 08:24:00', '2024-10-23 13:54:00'),
(125, 19, 'ytyyt', '2024-10-23 08:24:38', '2024-10-23 13:54:38'),
(126, 19, 'fgf', '2024-10-23 08:24:58', '2024-10-23 13:54:58'),
(127, 2, 'Model', '2024-09-24 06:17:19', '2024-09-24 11:47:19'),
(128, 4, 'Model', '2024-09-24 06:17:19', '2024-09-24 11:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes_value`
--

CREATE TABLE `product_attributes_value` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attributes_value`
--

INSERT INTO `product_attributes_value` (`id`, `product_id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 12, 19, 'fdgdfg', '2024-09-25 10:24:05', '2024-10-23 11:14:44'),
(2, 12, 20, 'fdgfdg', '2024-09-25 10:24:05', '2024-10-23 11:14:54'),
(3, 12, 21, 'dtdt', '2024-09-25 10:24:05', '2024-10-23 11:14:51'),
(4, 12, 22, 'fdgdfg', '2024-09-25 10:24:05', '2024-10-23 11:14:57'),
(7, 13, 19, '44324', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(8, 13, 20, '18788', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(9, 13, 21, '10009', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(10, 13, 22, '16654', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(11, 13, 24, '10909', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(12, 13, 25, '15646', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(13, 13, 26, '1679', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(14, 13, 27, '17546', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(15, 13, 12, '4354566', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(16, 13, 13, 'fsfsdf565', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(17, 13, 14, 'fdsfsdf565', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(18, 13, 15, 'sdfsdf6546', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(19, 13, 16, '822256', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(20, 13, 17, '1656', '2024-10-24 10:23:55', '2024-10-24 10:24:50'),
(21, 7, 102, '123', '2024-10-24 10:29:33', '2024-10-24 10:29:33'),
(22, 7, 103, '123', '2024-10-24 10:29:33', '2024-10-24 10:29:33'),
(23, 7, 104, '123', '2024-10-24 10:29:33', '2024-10-24 10:29:33'),
(24, 7, 105, '123', '2024-10-24 10:29:33', '2024-10-24 10:29:33'),
(25, 7, 106, '123', '2024-10-24 10:29:33', '2024-10-24 10:29:33'),
(26, 7, 107, '123', '2024-10-24 10:29:33', '2024-10-24 10:29:33'),
(27, 7, 18, 'ettre', '2024-10-24 10:30:28', '2024-10-24 10:30:28'),
(28, 14, 19, '15 kmpl', '2024-10-25 10:01:02', '2024-10-25 10:01:02'),
(29, 14, 20, '1497 cc', '2024-10-25 10:01:02', '2024-10-25 10:01:02'),
(30, 14, 21, '4', '2024-10-25 10:01:02', '2024-10-25 10:01:02'),
(31, 14, 22, 'Diesel', '2024-10-25 10:01:02', '2024-10-25 10:01:02'),
(32, 14, 24, 'Automatic', '2024-10-25 10:01:02', '2024-10-25 10:01:02'),
(33, 14, 25, 'No Value', '2024-10-25 10:01:02', '2024-10-25 10:01:02'),
(34, 14, 26, '2023', '2024-10-25 10:01:02', '2024-10-25 10:01:02'),
(35, 14, 27, '5', '2024-10-25 10:01:02', '2024-10-25 10:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_custom_attributes`
--

CREATE TABLE `product_custom_attributes` (
  `custom_attribute_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_name` varchar(100) NOT NULL,
  `attribute_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_custom_attributes`
--

INSERT INTO `product_custom_attributes` (`custom_attribute_id`, `product_id`, `attribute_name`, `attribute_value`) VALUES
(1, 3, 'Property Type', 'Apartment'),
(2, 3, 'Lease Duration', '12 months'),
(7, 3, 'Utilities Included', 'Water, Trash Removal'),
(8, 3, 'Flooring Type', 'Hardwood'),
(9, 3, 'Utilities Included', 'Water, Trash Removal'),
(10, 12, 'Laundry Type', 'In-Unit Washer/Dryer'),
(11, 12, 'Laundry T1ype', 'In-Unit Washer/Dryer'),
(12, 13, '5435', '4354'),
(13, 13, 'fdfd', 'fsfsdf'),
(14, 13, 'dfsdf', 'fdsfsdf'),
(15, 13, 'fdsfds', 'sdfsdf'),
(16, 13, '5522', '8222'),
(17, 13, 'fdfdf', '1'),
(18, 7, '543', 'ettre'),
(19, 7, '1223', '123'),
(20, 14, 'Engine Type', '1.5L KRYOJET'),
(21, 14, 'Displacement', '1497 cc'),
(22, 14, 'Max Power', '116bhp@4000rpm'),
(23, 14, 'Max Torque', '260Nm@1500-2750rpm');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `image_url`, `is_primary`, `created_at`) VALUES
(1, 4, 'car-1.jpg', 0, '2024-09-25 04:25:39'),
(2, 3, 'car-2.webp', 0, '2024-09-25 04:25:39'),
(3, 4, 'car-3.webp', 0, '2024-09-25 04:26:13'),
(4, 3, 'car-4.jpg', 0, '2024-09-25 04:26:13'),
(5, 3, 'car-5.webp', 0, '2024-09-25 04:26:13'),
(6, 8, 'uploads/products/8/img_66fe408f932449.47537841.jpg', 0, '2024-10-03 06:58:23'),
(19, 13, '6719c08a642897.39212677.png', 0, '2024-10-24 03:35:38'),
(20, 13, '6719c08a7054c6.12628627.png', 0, '2024-10-24 03:35:38'),
(21, 13, '6719d8951c1ac2.61092780.png', 0, '2024-10-24 05:18:13'),
(22, 13, '6719d89591d641.31882541.png', 0, '2024-10-24 05:18:13'),
(23, 13, '6719e58944c082.33959218.png', 0, '2024-10-24 06:13:29'),
(24, 13, '6719e58a0fa2e1.95584719.png', 0, '2024-10-24 06:13:30'),
(25, 13, '6719e63ed6bc78.61036931.png', 0, '2024-10-24 06:16:30'),
(26, 13, '6719e63f0f56f3.48981551.png', 0, '2024-10-24 06:16:31'),
(27, 13, '6719f9a9dd4302.10415276.png', 0, '2024-10-24 07:39:21'),
(28, 13, '6719f9ab55adb4.47092924.png', 0, '2024-10-24 07:39:23'),
(29, 14, '671b6b30753699.25859433.webp', 0, '2024-10-25 09:56:00'),
(30, 14, '671b6b3075a2f1.36078595.webp', 0, '2024-10-25 09:56:00'),
(31, 14, '671b6b38a65ec1.02125778.webp', 0, '2024-10-25 09:56:08'),
(32, 14, '671b6b38abad05.53089089.webp', 0, '2024-10-25 09:56:08'),
(33, 14, '671b6b3e2378a3.31685670.webp', 0, '2024-10-25 09:56:14'),
(34, 14, '671b6b3e287646.80459978.webp', 0, '2024-10-25 09:56:14'),
(35, 14, '671b6b463165e9.55128685.webp', 0, '2024-10-25 09:56:22'),
(36, 14, '671b6b463199a3.11874290.webp', 0, '2024-10-25 09:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_inquiries`
--

CREATE TABLE `product_inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inquiry_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_inquiries`
--

INSERT INTO `product_inquiries` (`inquiry_id`, `inquiry_date`, `product_id`, `user_id`, `inquiry_type`, `status`, `notes`) VALUES
(1, '2024-09-01 10:00:00', 3, 3, 'general inquiry', 'pending', 'awaiting response from user 3'),
(2, '2024-09-02 14:30:00', 4, 9, 'price inquiry', 'responded', 'sent price details to user 9'),
(3, '2024-09-03 09:15:00', 3, 10, 'availability check', 'closed', 'item in stock for user 10'),
(4, '2024-09-04 16:45:00', 4, 3, 'technical support', 'pending', 'follow up needed for user 3'),
(5, '2024-09-04 16:45:00', 4, 25, 'technical support', 'pending', 'follow up needed for user 3');

-- --------------------------------------------------------

--
-- Table structure for table `product_publish`
--

CREATE TABLE `product_publish` (
  `id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `marketplace` tinyint(1) NOT NULL,
  `website` tinyint(1) NOT NULL,
  `own_website` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_publish`
--

INSERT INTO `product_publish` (`id`, `product_id`, `marketplace`, `website`, `own_website`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, '2024-09-25 04:40:19', '2024-09-25 05:28:31'),
(2, 3, 1, 1, 1, '2024-09-25 04:40:19', '2024-09-25 04:40:19'),
(3, 8, 1, 1, 0, '2024-09-25 04:40:19', '2024-10-16 06:19:52'),
(4, 13, 1, 0, 0, '2024-10-21 06:22:45', '2024-10-23 09:51:23'),
(5, 12, 0, 0, 0, '2024-10-21 06:22:45', '2024-10-21 06:22:45'),
(6, 11, 0, 0, 0, '2024-10-21 06:22:45', '2024-10-21 06:22:45'),
(7, 7, 0, 0, 0, '2024-10-21 06:22:45', '2024-10-21 06:22:45'),
(8, 14, 1, 1, 1, '2024-10-25 09:51:45', '2024-10-25 10:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_name` varchar(100) NOT NULL,
  `additional_price` decimal(10,2) DEFAULT 0.00,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_rewards`
--

CREATE TABLE `referral_rewards` (
  `id` int(11) NOT NULL,
  `referrer_id` int(11) DEFAULT NULL,
  `referred_id` int(11) DEFAULT NULL,
  `reward_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral_rewards`
--

INSERT INTO `referral_rewards` (`id`, `referrer_id`, `referred_id`, `reward_amount`, `created_at`) VALUES
(1, 2, 24, 10.00, '2024-10-08 10:18:46'),
(2, 1, 25, 10.00, '2024-10-08 10:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `text_color` varchar(7) NOT NULL,
  `button_color` varchar(7) NOT NULL,
  `active_button_color` varchar(7) NOT NULL,
  `active_text_color` varchar(7) NOT NULL,
  `button_padding` varchar(5) NOT NULL,
  `button_rounded` varchar(10) NOT NULL,
  `button_active` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `text_color`, `button_color`, `active_button_color`, `active_text_color`, `button_padding`, `button_rounded`, `button_active`, `created_at`) VALUES
(1, '#110303', '#e60063', '#003e80', '#bc0101', 'p-2', 'rounded-3', 'active', '2024-10-07 08:52:11'),
(2, '#110303', '#d1005b', '#003e80', '#bc0101', 'p-2', 'rounded-3', 'active', '2024-10-07 08:57:31'),
(3, '#110303', '#e4116c', '#003e80', '#bc0101', 'p-2', 'rounded-3', 'active', '2024-10-07 08:58:11'),
(4, '#110303', '#df96b5', '#003e80', '#bc0101', 'p-2', 'rounded-3', 'active', '2024-10-07 08:59:49'),
(5, '#110303', '#df96b5', '#003e80', '#0ff90b', 'p-2', 'rounded-3', 'active', '2024-10-07 09:09:14'),
(6, '#be6f6f', '#df96b5', '#003e80', '#0ff90b', 'p-2', 'rounded-4', 'active', '2024-10-23 08:28:00'),
(7, '#f0e0e0', '#df96b5', '#003e80', '#0ff90b', 'p-2', 'rounded-4', 'active', '2024-10-23 08:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_start` datetime NOT NULL,
  `subscription_end` datetime NOT NULL,
  `status` enum('active','inactive','canceled') NOT NULL DEFAULT 'active',
  `coupon_id` int(11) DEFAULT NULL,
  `discount_value` decimal(10,2) DEFAULT 0.00,
  `subscription_amount` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `user_id`, `subscription_start`, `subscription_end`, `status`, `coupon_id`, `discount_value`, `subscription_amount`, `created_at`, `updated_at`) VALUES
(11, 1, '2024-01-01 10:00:00', '2025-01-01 10:00:00', 'active', 1, 10.00, 999.00, '2024-10-14 16:43:28', '2024-10-15 10:50:38'),
(12, 4, '2024-02-15 14:30:00', '2025-02-15 14:30:00', 'active', 2, 15.00, 788.00, '2024-10-14 16:43:28', '2024-10-15 10:51:00'),
(13, 5, '2024-03-10 09:00:00', '2025-03-10 09:00:00', 'inactive', 3, 0.00, 855.00, '2024-10-14 16:43:28', '2024-10-15 10:50:56'),
(14, 6, '2024-04-05 12:00:00', '2025-04-05 12:00:00', 'canceled', 4, 20.00, 800.00, '2024-10-14 16:43:28', '2024-10-15 10:51:05'),
(15, 7, '2024-05-20 11:00:00', '2025-05-20 11:00:00', 'active', NULL, 5.00, 999.00, '2024-10-14 16:43:28', '2024-10-15 10:50:42'),
(16, 11, '2024-06-15 13:45:00', '2025-06-15 13:45:00', 'active', 2, 25.00, 8520.00, '2024-10-14 16:43:28', '2024-10-15 10:51:09'),
(17, 17, '2024-07-25 15:30:00', '2025-07-25 15:30:00', 'inactive', 7, 0.00, 999.00, '2024-10-14 16:43:28', '2024-10-15 10:50:45'),
(18, 18, '2024-08-30 16:00:00', '2025-08-30 16:00:00', 'active', 8, 10.00, 999.00, '2024-10-14 16:43:28', '2024-10-15 10:50:48'),
(19, 19, '2024-09-10 08:15:00', '2025-09-10 08:15:00', 'active', 9, 15.00, 85.00, '2024-10-14 16:43:28', '2024-10-15 10:51:15'),
(20, 1, '2024-10-12 17:20:00', '2025-10-12 17:20:00', 'canceled', 10, 30.00, 999.00, '2024-10-14 16:43:28', '2024-10-15 10:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_type` enum('credit','debit') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('dealer','admin','customer','sales_agent','website_user') NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `user_status` enum('active','inactive','pending','suspended') DEFAULT 'pending',
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `referral_code` varchar(255) DEFAULT NULL,
  `referred_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password_hash`, `role`, `first_name`, `last_name`, `mobile_number`, `profile_pic`, `user_status`, `otp`, `created_at`, `referral_code`, `referred_by`) VALUES
(1, 'dealer@marketplace.com', '$2y$10$cm7NYu.Z4IxBazJrF84Tu.5p71i3PDGIsdRUTrpLtDURqzxt.asZm', 'dealer', 'Amir', 'Ahmed', '8520741963', '1.png', 'active', NULL, '2024-09-23 04:15:49', 'REFKENZ01', NULL),
(2, 'kenz@marketplace.com', '$2y$10$IOQWwmiTUGcykiR37QIUjuqaUuudqe/Y0sYuT7BDDm6yyQlG7VmHi', 'admin', 'Kenz', 'Marketplace', '3698520147', '2.png', 'active', NULL, '2024-09-23 04:16:19', 'REFKENZ02', NULL),
(3, 'customer@marketplace.com', '$2y$10$GLEI5Ugu0/9K596OJQrbX.609u/teVbNy1QXeYvaa7ne/XyJx6CyC', 'customer', 'Farooq', 'Nawaz', '2513647890', '3.png', 'pending', NULL, '2024-09-23 04:16:33', 'REFKENZ03', NULL),
(4, 'dealer1@marketplace.com', '$2y$10$cm7NYu.Z4IxBazJrF84Tu.5p71i3PDGIsdRUTrpLtDURqzxt.asZm', 'dealer', 'Mudassir', 'Mohmmad', '9876543210', '4.png', 'active', NULL, '2024-09-23 04:15:49', 'REFKENZ04', NULL),
(5, 'dealer2@marketplace.com', '$2y$10$9ZpReDJiHs72nHV561g88.LSNlxQ4bd/TGFBEI4iKPS9v/xrjhmwG', 'dealer', 'Dealer', 'dealer', '9638520741', '5.png', 'pending', NULL, '2024-09-23 04:26:05', 'REFKENZ05', NULL),
(6, 'dealer3@marketplace.com', '$2y$10$wkMP5e1d5Qd3aHsQYj2DNeoEID4qEIBnyF/pdPqkYb/JsLM3CYCTq', 'dealer', 'Balaraju', 'Kotakonda', '7418520963', '6.png', 'active', NULL, '2024-09-23 04:26:11', 'REFKENZ06', NULL),
(7, 'dealer4@marketplace.com', '$2y$10$ZIiBpfWl6/SeI5r9KgLOQOFkqzPR.3svsDEXDDXAPdhigaYWJw5fa', 'dealer', 'Isa', 'Hundai', '8963025417', '7.png', 'pending', NULL, '2024-09-23 04:26:16', 'REFKENZ07', NULL),
(9, 'john@marketplace.com', '$2y$10$wkMP5e1d5Qd3aHsQYj2DNeoEID4qEIBnyF/pdPqkYb/JsLM3CYCTq', 'sales_agent', 'John', 'Smith', '2010202020', '6.png', 'active', NULL, '2024-09-23 04:26:11', 'REFKENZ09', NULL),
(10, 'smith@marketplace.com', '$2y$10$GLEI5Ugu0/9K596OJQrbX.609u/teVbNy1QXeYvaa7ne/XyJx6CyC', 'customer', 'smith', 'smith', '25520202562', '3.png', 'pending', NULL, '2024-09-23 04:16:33', 'REFKENZ010', NULL),
(11, 'mudassir@gmail.com', '$2y$10$UW2xvjLNr..2xk3N1Eg04.8KHFym2Bte52BWTNACrwUwrhVtTpmJG', 'dealer', 'Mudassir', 'mohhmad', '123456790', NULL, 'pending', NULL, '2024-10-01 03:49:51', 'REFKENZ011', NULL),
(17, 'naman.intelcode@gmail.com', '$2y$10$Y0uyu7vgP8bKevrm4Ai5u.f5kcVxcIbw4L4YmyRnLHjge.KWY4QDK', 'dealer', 'Naman', 'khobraagde', '8520741963', NULL, 'pending', 143809, '2024-10-01 05:51:13', 'REFKENZ017', NULL),
(18, 'easn.amirali@gmail.com', '$2y$10$YswgjF16VE4AjorF4wdbDe3qOiTskF.F6B5v9UlhInNp5cQd/nbNi', 'dealer', 'Amir', 'Ali', '7845162930', NULL, 'pending', 815576, '2024-10-01 08:29:07', 'REFKENZ018', NULL),
(19, 'farooq.edess@gmail.com', '$2y$10$XowlJydr4wuu9pEbUBobauJPZgFf7PKZcmNB7732/yNQD/OuIKUQu', 'dealer', 'Farooq', 'Nawas', '8546120397', NULL, 'pending', 183270, '2024-10-03 07:09:37', 'REFKENZ019', NULL),
(20, 'usertesting@gmail.com', '$2y$10$Csafb4Z4Z8.TGwBvdl8dO.3HRqh2dl81EPRZcIOFTuy5bUfk238Pu', 'website_user', 'Testing', 'Testing', '1234567890', NULL, 'pending', NULL, '2024-10-08 09:38:20', 'REFKENZ020', NULL),
(22, 'usertesting@gmail.com1', '$2y$10$DPPNoRkFfSGgau4v0yHpW.XxSLTVIbHxEp1gE8GnLJj7ARPDFdK.C', 'website_user', 'Testing', 'Testing', '1234567890', NULL, 'pending', NULL, '2024-10-08 09:39:11', 'REFKENZ022', NULL),
(23, 'testing@gmail.com', '$2y$10$Pl4dQ5Y5SToDdlWGxoaba.LM2kEGBNwfcIQnwENw0i6IiEwU0Trse', 'website_user', 'Testing', 'Tsting', '8546231028', NULL, 'pending', NULL, '2024-10-08 10:15:47', 'REFKENZ23', ''),
(24, 'te@gmail.com', '$2y$10$d4G2yq.2Y6VRWZpnfjRbUuel9z9rKUgujMiNoDT0bbdaYsQk6lg36', 'website_user', 'Testing', 'testing', '8520134678', NULL, 'pending', NULL, '2024-10-08 10:18:46', 'REFKENZ24', '022'),
(25, '8520@gmail.com', '$2y$10$i90YPrl/5NEy5j92ESjDFeMjAeqXN1r7E/clD3FBukj6.IG8u.846', 'website_user', 'hellow', 'Wrld', '8520794613', '6.png', 'pending', NULL, '2024-10-08 10:20:45', 'REFKENZ25', '22');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `permission_id`) VALUES
(7, 23, 1),
(9, 23, 2),
(8, 23, 4),
(6, 23, 5),
(10, 23, 7),
(4, 24, 1),
(2, 24, 3),
(1, 24, 4),
(5, 24, 6),
(3, 24, 7);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_inspection`
--

CREATE TABLE `vehicle_inspection` (
  `inspection_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `inspected_by` varchar(255) NOT NULL,
  `inspected_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `engine_oil_level` varchar(255) DEFAULT NULL,
  `engine_oil_leakage` varchar(255) DEFAULT NULL,
  `transmission_oil_leakage` varchar(255) DEFAULT NULL,
  `transfer_case_oil_leakage` varchar(255) DEFAULT NULL,
  `coolant_leakage` varchar(255) DEFAULT NULL,
  `brake_oil_leakage` varchar(255) DEFAULT NULL,
  `power_steering_oil_leakage` varchar(255) DEFAULT NULL,
  `differential_oil_leakage` varchar(255) DEFAULT NULL,
  `fan_belt_condition` varchar(255) DEFAULT NULL,
  `engine_noise` varchar(255) DEFAULT NULL,
  `engine_vibration` varchar(255) DEFAULT NULL,
  `exhaust_sound` varchar(255) DEFAULT NULL,
  `radiator_condition` varchar(255) DEFAULT NULL,
  `transmission_electronics` varchar(255) DEFAULT NULL,
  `front_right_disc_condition` varchar(255) DEFAULT NULL,
  `front_left_disc_condition` varchar(255) DEFAULT NULL,
  `front_right_brake_pad_condition` varchar(255) DEFAULT NULL,
  `front_left_brake_pad_condition` varchar(255) DEFAULT NULL,
  `steering_wheel_play` varchar(255) DEFAULT NULL,
  `ball_joints_condition` varchar(255) DEFAULT NULL,
  `z_links_condition` varchar(255) DEFAULT NULL,
  `tie_rod_ends_condition` varchar(255) DEFAULT NULL,
  `shock_absorbers_condition` varchar(255) DEFAULT NULL,
  `rear_suspension_bushes_condition` varchar(255) DEFAULT NULL,
  `rear_shocks_condition` varchar(255) DEFAULT NULL,
  `steering_wheel_condition` varchar(255) DEFAULT NULL,
  `seats_electric_function` varchar(255) DEFAULT NULL,
  `seat_belts_condition` varchar(255) DEFAULT NULL,
  `windows_condition` varchar(255) DEFAULT NULL,
  `dash_controls_condition` varchar(255) DEFAULT NULL,
  `audio_video_condition` varchar(255) DEFAULT NULL,
  `rear_view_camera_condition` varchar(255) DEFAULT NULL,
  `trunk_bonnet_release_condition` varchar(255) DEFAULT NULL,
  `sun_roof_control_condition` varchar(255) DEFAULT NULL,
  `ac_operational` varchar(255) DEFAULT NULL,
  `blower_air_throw_condition` varchar(255) DEFAULT NULL,
  `cooling_condition` varchar(255) DEFAULT NULL,
  `heating_condition` varchar(255) DEFAULT NULL,
  `warning_lights_condition` varchar(255) DEFAULT NULL,
  `battery_condition` varchar(255) DEFAULT NULL,
  `instrument_cluster_condition` varchar(255) DEFAULT NULL,
  `trunk_lock_condition` varchar(255) DEFAULT NULL,
  `windshield_condition` varchar(255) DEFAULT NULL,
  `window_condition` varchar(255) DEFAULT NULL,
  `headlights_condition` varchar(255) DEFAULT NULL,
  `taillights_condition` varchar(255) DEFAULT NULL,
  `fog_lights_condition` varchar(255) DEFAULT NULL,
  `tyre_brand` varchar(255) DEFAULT NULL,
  `tyre_tread` varchar(255) DEFAULT NULL,
  `tyre_size` varchar(255) DEFAULT NULL,
  `rims_condition` varchar(255) DEFAULT NULL,
  `engine_pick_feedback` varchar(255) DEFAULT NULL,
  `gear_shifting_feedback` varchar(255) DEFAULT NULL,
  `brake_pedal_operation_feedback` varchar(255) DEFAULT NULL,
  `abs_operation_feedback` varchar(255) DEFAULT NULL,
  `suspension_noise_feedback` varchar(255) DEFAULT NULL,
  `steering_operation_feedback` varchar(255) DEFAULT NULL,
  `ac_heater_feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_dealer_name` text DEFAULT NULL,
  `engine_capacity` varchar(50) DEFAULT NULL,
  `mileage` varchar(50) DEFAULT NULL,
  `fuel_type` varchar(50) DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `chassis_no` text DEFAULT NULL,
  `engine_no` text DEFAULT NULL,
  `registration_no` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `registered_city` varchar(100) DEFAULT NULL,
  `transmission_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_inspection`
--

INSERT INTO `vehicle_inspection` (`inspection_id`, `car_id`, `inspected_by`, `inspected_date`, `engine_oil_level`, `engine_oil_leakage`, `transmission_oil_leakage`, `transfer_case_oil_leakage`, `coolant_leakage`, `brake_oil_leakage`, `power_steering_oil_leakage`, `differential_oil_leakage`, `fan_belt_condition`, `engine_noise`, `engine_vibration`, `exhaust_sound`, `radiator_condition`, `transmission_electronics`, `front_right_disc_condition`, `front_left_disc_condition`, `front_right_brake_pad_condition`, `front_left_brake_pad_condition`, `steering_wheel_play`, `ball_joints_condition`, `z_links_condition`, `tie_rod_ends_condition`, `shock_absorbers_condition`, `rear_suspension_bushes_condition`, `rear_shocks_condition`, `steering_wheel_condition`, `seats_electric_function`, `seat_belts_condition`, `windows_condition`, `dash_controls_condition`, `audio_video_condition`, `rear_view_camera_condition`, `trunk_bonnet_release_condition`, `sun_roof_control_condition`, `ac_operational`, `blower_air_throw_condition`, `cooling_condition`, `heating_condition`, `warning_lights_condition`, `battery_condition`, `instrument_cluster_condition`, `trunk_lock_condition`, `windshield_condition`, `window_condition`, `headlights_condition`, `taillights_condition`, `fog_lights_condition`, `tyre_brand`, `tyre_tread`, `tyre_size`, `rims_condition`, `engine_pick_feedback`, `gear_shifting_feedback`, `brake_pedal_operation_feedback`, `abs_operation_feedback`, `suspension_noise_feedback`, `steering_operation_feedback`, `ac_heater_feedback`, `created_at`, `updated_at`, `customer_dealer_name`, `engine_capacity`, `mileage`, `fuel_type`, `inspection_date`, `chassis_no`, `engine_no`, `registration_no`, `location`, `registered_city`, `transmission_type`) VALUES
(1, 13, 'John Doe', '2024-11-04 18:30:00', 'Black', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'Ok', 'No Noise', 'No Vibration', 'Ok', 'Ok', 'Ok', 'Damaged', 'Damaged', 'Worn Out', 'Worn Out', 'Ok', 'Ok (Right & Left)', 'Ok (Right & Left)', 'Ok (Right & Left)', 'Ok (Right & Left)', 'No Damage Found', 'Ok', 'Ok', 'Working (Right & Left Front)', 'Working (Front & Rear)', 'Working Properly (All 4 Windows)', 'Working (A/C, De-Fog, Hazard Lights, etc.)', 'Working', 'Working', 'Working', 'Working', 'Yes', 'Excellent', 'Excellent', 'Excellent', 'ABS Warning Light Present', '12V, Terminals Condition Ok', 'Gauges Working', 'Ok', 'Chip (Front)', 'Ok (All Windows)', 'Working (Perfect Condition)', 'Working (Perfect Condition)', 'Working', 'Michelin', '7.0mm (Remaining)', '275/50/R21', 'Alloy', 'Ok', 'Smooth', 'Timely Response', 'Timely Response', 'No Noise', 'Smooth', 'Perfect', '2024-11-06 09:13:06', '2024-11-06 11:41:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 14, '2', '2024-11-06 11:42:11', 'N/A', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'No Leakage', 'Ok', 'No Noise', 'No Vibration', 'Rough', 'Damaged', 'Not Responding', 'Smooth', 'Smooth', 'More than 50%', 'More than 50%', 'Loose', 'Worn', 'Worn', 'Worn', 'Worn', 'Worn', 'Worn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ok', 'Chip (Front)', 'Ok (All Windows)', 'Working (Perfect Condition)', 'Working (Perfect Condition)', 'Working', 'Michelin 11', '7.0mm (Remaining) 11', '275/50/R21 11', 'Steel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-06 11:42:11', '2024-11-06 11:53:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`wallet_id`, `user_id`, `balance`, `created_at`) VALUES
(1, 1, 320.00, '2024-10-21 07:13:53'),
(2, 4, 50.00, '2024-10-21 07:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`id`, `wallet_id`, `user_id`, `amount`, `transaction_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, -20.00, 'Feature Product', '2024-11-06 04:34:37', '2024-11-06 04:34:37'),
(2, 1, 1, -200.00, 'Inspection Request', '2024-11-06 04:39:02', '2024-11-06 04:39:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`dealer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`dealer_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `products_ibfk_3` (`brand_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`pf_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `product_attributes_value`
--
ALTER TABLE `product_attributes_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `product_custom_attributes`
--
ALTER TABLE `product_custom_attributes`
  ADD PRIMARY KEY (`custom_attribute_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_inquiries`
--
ALTER TABLE `product_inquiries`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_publish`
--
ALTER TABLE `product_publish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `referral_rewards`
--
ALTER TABLE `referral_rewards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrer_id` (`referrer_id`),
  ADD KEY `referred_id` (`referred_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `referral_code` (`referral_code`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `vehicle_inspection`
--
ALTER TABLE `vehicle_inspection`
  ADD PRIMARY KEY (`inspection_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_id` (`wallet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `dealer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `pf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `product_attributes_value`
--
ALTER TABLE `product_attributes_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_custom_attributes`
--
ALTER TABLE `product_custom_attributes`
  MODIFY `custom_attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_inquiries`
--
ALTER TABLE `product_inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_publish`
--
ALTER TABLE `product_publish`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_rewards`
--
ALTER TABLE `referral_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_inspection`
--
ALTER TABLE `vehicle_inspection`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `dealers`
--
ALTER TABLE `dealers`
  ADD CONSTRAINT `dealers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `dealers_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`variant_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `product_attributes_value`
--
ALTER TABLE `product_attributes_value`
  ADD CONSTRAINT `product_attributes_value_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_attributes_value_ibfk_2` FOREIGN KEY (`attribute_id`) REFERENCES `product_attributes` (`pf_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_custom_attributes`
--
ALTER TABLE `product_custom_attributes`
  ADD CONSTRAINT `product_custom_attributes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_inquiries`
--
ALTER TABLE `product_inquiries`
  ADD CONSTRAINT `product_inquiries_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_inquiries_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `product_publish`
--
ALTER TABLE `product_publish`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `referral_rewards`
--
ALTER TABLE `referral_rewards`
  ADD CONSTRAINT `referral_rewards_ibfk_1` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `referral_rewards_ibfk_2` FOREIGN KEY (`referred_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`coupon_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`wallet_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicle_inspection`
--
ALTER TABLE `vehicle_inspection`
  ADD CONSTRAINT `vehicle_inspection_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD CONSTRAINT `wallet_transactions_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`wallet_id`),
  ADD CONSTRAINT `wallet_transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
