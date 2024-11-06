<?php
session_start();
include '../../includes/db.php';

// Validate user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

// Validate required POST data exists
if (!isset($_POST['formId']) || !isset($_POST['formData'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required form data']);
    exit;
}

$user_id = $_SESSION['user_id'];
$formData = $_POST['formData'];  // Form data from the submitted form

// Get car_id from form data
$car_id = null;
foreach ($formData as $field) {
    if ($field['name'] === 'car_id') {
        $car_id = filter_var($field['value'], FILTER_VALIDATE_INT);
        break;
    }
}

if (!$car_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid or missing car ID']);
    exit;
}

// Check if inspection record exists for this car
$check_sql = "SELECT inspection_id FROM vehicle_inspection WHERE car_id = '" . mysqli_real_escape_string($conn, $car_id) . "'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // Update existing record
    $row = mysqli_fetch_assoc($check_result);
    $inspection_id = $row['inspection_id'];
    
    $update_fields = [];
    
    // Collect valid fields for update
    foreach ($formData as $field) {
        if ($field['name'] !== 'car_id') {
            $column_name = mysqli_real_escape_string($conn, $field['name']);
            $value = mysqli_real_escape_string($conn, $field['value']);
            $update_fields[] = "`" . $column_name . "` = '" . $value . "'";
        }
    }
    
    if (!empty($update_fields)) {
        $sql = "UPDATE vehicle_inspection SET " . implode(", ", $update_fields) . ", updated_at = NOW() WHERE inspection_id = '" . mysqli_real_escape_string($conn, $inspection_id) . "'";
        
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['success' => true, 'message' => 'Inspection record updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating inspection: ' . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No valid fields to update']);
    }

} else {
    // Insert new record
    $insert_fields = ['car_id', 'inspected_by'];
    $insert_values = ["'" . mysqli_real_escape_string($conn, $car_id) . "'", 
                     "'" . mysqli_real_escape_string($conn, $user_id) . "'"];

    // Insert valid fields based on form data
    foreach ($formData as $field) {
        if ($field['name'] !== 'car_id') {
            $column_name = mysqli_real_escape_string($conn, $field['name']);
            $value = mysqli_real_escape_string($conn, $field['value']);
            $insert_fields[] = "`" . $column_name . "`";
            $insert_values[] = "'" . $value . "'";
        }
    }

    // Build SQL query for insertion
    $sql = "INSERT INTO vehicle_inspection (" . implode(", ", $insert_fields) . ", created_at, updated_at) 
            VALUES (" . implode(", ", $insert_values) . ", NOW(), NOW())";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'New inspection record created successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error creating inspection: ' . mysqli_error($conn)]);
    }
}

mysqli_close($conn);
?>
