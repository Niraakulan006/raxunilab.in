<?php
header('Content-Type: application/json');


// Check if the file is uploaded via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['upload'])) {
    // Define the upload directory
    $uploadDir = '../images/upload/';
    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate a unique name for the file
    $fileName = basename($_FILES['upload']['name']);
    $filePath = $uploadDir . uniqid() . '-' . $fileName;
    
    // Try moving the uploaded file to the upload directory
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $filePath)) {
        // Send a successful response with the URL of the uploaded file
        echo json_encode(['url' => $filePath]);
    } else {
        // If the upload fails, return an error message
        echo json_encode(['error' => 'Failed to upload image']);
    }
} else {
    // If not a POST request or no file uploaded, return an error
    echo json_encode(['error' => 'Invalid request']);
}
?>
