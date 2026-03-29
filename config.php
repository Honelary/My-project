      <?php
/**
 * Database Configuration File
 * This file contains database connection settings
 * 
 * IMPORTANT: For security, never commit this file with real credentials to public repositories
 */

// Database credentials
define('DB_HOST', 'sql211.infinityfree.com');        // Database host (usually 'localhost')
define('DB_USER', 'if0_41428876');             // Database username (default is 'root' for local development)
define('DB_PASS', 'Wetungu28');                 // Database password (empty for local XAMPP/WAMP)
define('DB_NAME', 'if0_41428876_electrician_db'); // Database name

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    // Log error for debugging (in production, log to file instead of displaying)
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8 for proper handling of special characters
$conn->set_charset("utf8mb4");

// Optional: Set timezone (adjust to your timezone)
date_default_timezone_set('America/New_York');

/**
 * Note for deployment:
 * When deploying to a live server, update the credentials above with your hosting provider's details:
 * - DB_HOST: Provided by your hosting company
 * - DB_USER: Your database username
 * - DB_PASS: Your database password
 * - DB_NAME: Your database name
 */
?>