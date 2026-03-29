<?php
/**
 * Contact Form Submission Handler
 * This file processes contact form submissions and saves them to the database
 */

// Set response header to JSON
header('Content-Type: application/json');

// Include database configuration
require_once 'config.php';

// Initialize response array
$response = array();

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Sanitize and validate input data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);
    
    // Validation: Check if all fields are filled
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        $response['success'] = false;
        $response['message'] = 'Please fill in all fields.';
        echo json_encode($response);
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['success'] = false;
        $response['message'] = 'Please enter a valid email address.';
        echo json_encode($response);
        exit;
    }
    
    // Validate phone number (basic validation - at least 10 digits)
    $phone_cleaned = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone_cleaned) < 10) {
        $response['success'] = false;
        $response['message'] = 'Please enter a valid phone number.';
        echo json_encode($response);
        exit;
    }
    
    // Additional security: Escape special characters to prevent SQL injection
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    
    try {
        // Prepare SQL statement to insert data into database
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);
        
        // Execute the statement
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Thank you! Your message has been sent successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Sorry, something went wrong. Please try again later.';
        }
        
        // Close statement
        $stmt->close();
        
    } catch (Exception $e) {
        $response['success'] = false;
        $response['message'] = 'Database error: ' . $e->getMessage();
    }
    
    // Close database connection
    $conn->close();
    
} else {
    // If not POST request, return error
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

// Return JSON response
echo json_encode($response);
?>