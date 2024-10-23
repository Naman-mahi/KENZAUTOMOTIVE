<?php
include '../includes/db.php'; // Adjust to your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $dealerid = 1; // This should be set according to your application logic
    $make = htmlspecialchars($_POST['car']);
    $model = htmlspecialchars($_POST['model']);
    $year = htmlspecialchars($_POST['year']);
    $price = htmlspecialchars($_POST['price']);
    $color = htmlspecialchars($_POST['color']);
    $mileage = htmlspecialchars($_POST['mileage']);
    $transmission = htmlspecialchars($_POST['transmission_spec']);
    $fueltype = htmlspecialchars($_POST['fueltype']);
    $bodytype = htmlspecialchars($_POST['bodytype']);
    $doors = htmlspecialchars($_POST['doors']);
    $seats = htmlspecialchars($_POST['seats']);
    $car_description = htmlspecialchars($_POST['car_description']);
    $engine = htmlspecialchars($_POST['engine']);
    $power = htmlspecialchars($_POST['power']);
    $torque = htmlspecialchars($_POST['torque']);
    $top_features = htmlspecialchars($_POST['top_features']);
    $stand_out_features = htmlspecialchars($_POST['stand_out_features']);

    // Handle file uploads
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true); // Create the directory if it does not exist
    }
    $upload_cars_dir = 'uploads/cars/';
    if (!is_dir($upload_cars_dir)) {
        mkdir($upload_cars_dir, 0755, true); // Create the directory if it does not exist
    }

    // Function to generate a unique file name
    function generate_unique_filename($original_name)
    {
        $timestamp = date("YmdHis");
        $file_ext = pathinfo($original_name, PATHINFO_EXTENSION);
        return $timestamp . "_" . uniqid() . "." . $file_ext;
    }

    // Process images
    $desktop_image = generate_unique_filename($_FILES['desktop_image']['name']);
    $mobile_image = generate_unique_filename($_FILES['mobile_image']['name']);

    $desktop_image_path = $upload_dir . basename($desktop_image);
    $mobile_image_path = $upload_dir . basename($mobile_image);

    // Validate and move uploaded files
    if (move_uploaded_file($_FILES['desktop_image']['tmp_name'], $desktop_image_path) === false) {
        echo "Error uploading desktop image.";
        exit;
    }
    if (move_uploaded_file($_FILES['mobile_image']['tmp_name'], $mobile_image_path) === false) {
        echo "Error uploading mobile image.";
        exit;
    }

    // Handle multiple additional images
    $additional_images_paths = [];
    $additional_images = $_FILES['additional_images']['name'];
    $additional_images_tmp = $_FILES['additional_images']['tmp_name'];

    foreach ($additional_images as $key => $image) {
        if (is_uploaded_file($additional_images_tmp[$key])) {
            $file_path = $upload_cars_dir . generate_unique_filename($image);
            if (move_uploaded_file($additional_images_tmp[$key], $file_path)) {
                $additional_images_paths[] = basename($file_path);
            }
        }
    }
    $additional_images_list = implode(',', $additional_images_paths);

    // Insert car details into the database
    $sql = "INSERT INTO cars (
        dealerid, car_name, model, year, price, color, mileage, transmission, 
        fueltype, bodytype, doors, seats, car_description, engine, power, 
        torque, top_features, stand_out_features, images, desktop_image, 
        mobile_image, createdat
    ) VALUES (
        $dealerid, '$make', '$model', $year, $price, '$color', '$mileage', 
        '$transmission', '$fueltype', '$bodytype', $doors, $seats, 
        '$car_description', '$engine', '$power', '$torque', 
        '$top_features', '$stand_out_features', '$additional_images_list', 
        '$desktop_image', '$mobile_image', NOW()
    )";

     if ($conn->query($sql) === TRUE) {
        // Redirect to Mycars.php with a query parameter indicating success
        header('Location: Mycars.php?status=success');
        exit;
    } else {
        // Redirect to Mycars.php with a query parameter indicating failure
        header('Location: Mycars.php?status=error');
        exit;
    }

    $conn->close();
}
