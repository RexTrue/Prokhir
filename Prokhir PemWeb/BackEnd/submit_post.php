<?php
include "../config.php";

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo json_encode(["error" => "User not authenticated"]);
    exit;
}

$username = $_SESSION['username'];
$content = $_POST['content'] ?? '';

// Validate content input
if (empty(trim($content))) {
    echo json_encode(["error" => "Content cannot be empty"]);
    exit;
}

// Sanitize content input
$content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');

// Prepare SQL query to insert the post
$sql = "INSERT INTO posts (username, content) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(["error" => "Failed to prepare the SQL statement"]);
    exit;
}

// Bind parameters and execute
$stmt->bind_param("ss", $username, $content);

if ($stmt->execute()) {
    // Return the newly created post data
    echo json_encode([
        "username" => $username,
        "content" => $content,
        "created_at" => date("Y-m-d H:i:s")
    ]);
} else {
    // If execution failed, output the error message
    echo json_encode(["error" => "Failed to post. " . $stmt->error]);
}

// Clean up
$stmt->close();
$conn->close();
?>
