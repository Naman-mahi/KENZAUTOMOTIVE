<?php
include '../../includes/db.php';

// Log incoming data for debugging
file_put_contents('php://stderr', print_r($_POST, TRUE));  // Logs text fields
file_put_contents('php://stderr', print_r($_FILES, TRUE));  // Logs files

// Check if the form is submitted and required fields are set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'], $_POST['description'], $_POST['inspection_id'], $_POST['position_x'], $_POST['position_y'])) {
    // Get the posted data
    $x = $_POST['position_x'];
    $y = $_POST['position_y'];
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $inspection_id = $conn->real_escape_string($_POST['inspection_id']);
    $image_url = null;  // Default to null in case no image is uploaded

    // Handle the image upload (if any)
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === 0) {
        $image = $_FILES['image_url'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_size = $image['size'];
        $image_error = $image['error'];

        // Define allowed file extensions
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        // Validate the image file
        if (in_array($image_extension, $allowed_extensions)) {
            if ($image_error === 0) {
                if ($image_size < 5000000) { // 5MB size limit
                    // Generate a unique file name
                    $image_new_name = uniqid('', true) . '.' . $image_extension;
                    $image_folder = '../uploads/inspection_points/'; // Folder to store images

                    // Ensure the folder exists
                    if (!file_exists($image_folder)) {
                        mkdir($image_folder, 0777, true);
                    }

                    // Move the uploaded file to the folder
                    $image_destination = $image_folder . $image_new_name;
                    if (move_uploaded_file($image_tmp, $image_destination)) {
                        $image_url = $image_new_name; // Store URL in DB
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Failed to move the uploaded file.']);
                        exit();
                    }
                } else {
                    echo json_encode(['success' => false, 'error' => 'File size is too large.']);
                    exit();
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Error uploading the file.']);
                exit();
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid file type. Only JPG, JPEG, PNG, GIF, WEBP are allowed.']);
            exit();
        }
    }

    // SQL query to insert the point data into the database
    $sql = "INSERT INTO inspection_car_points (position_x, position_y, title, description, inspection_id, image_url) 
            VALUES ('$x', '$y', '$title', '$description', '$inspection_id', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        // Return success response
        echo json_encode(['success' => true, 'message' => 'Point saved successfully!']);
    } else {
        // Return error response if insertion fails
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
} else {
    // If the required data is not found in the request
    echo json_encode(['success' => false, 'error' => 'Invalid input data.']);
}

// Close the database connection
$conn->close();
