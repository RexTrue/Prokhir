<?php
include "../config.php";
session_start();

header('Content-Type: application/json');

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    echo json_encode(["error" => "User is not logged in"]);
    exit;
}

$username = $_SESSION['username'];
$posts = [];

// Cek koneksi database
if ($conn->connect_error) {
    echo json_encode(["error" => "Failed to connect to database"]);
    exit;
}

// Menggunakan prepared statement untuk menghindari SQL Injection
$sql = "SELECT * FROM posts WHERE username = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(["error" => "Failed to prepare statement: " . $conn->error]);
    exit;
}

// Bind parameter dan eksekusi statement
$stmt->bind_param("s", $username); // "s" menunjukkan tipe string untuk username
if ($stmt->execute()) {
    $result = $stmt->get_result();
    
    // Fetch data
    while ($row = $result->fetch_assoc()) {
        $posts[] = [
            'id_content' => $row['id_content'],
            'username' => htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8'),
            'content' => htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'),
            'created_at' => $row['created_at']
        ];
    }
    
    // Mengirim response sebagai JSON
    echo json_encode($posts);
} else {
    echo json_encode(["error" => "Failed to execute statement: " . $stmt->error]);
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>
