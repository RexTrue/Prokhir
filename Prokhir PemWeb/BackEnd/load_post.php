<?php
include "../config.php";

header('Content-Type: application/json');

$posts = [];

if ($conn->connect_error) {
    echo json_encode(["error" => "Failed to connect to database"]);
    exit;
}

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = [
            'id_content' => $row['id_content'],
            'username' => htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8'),
            'content' => htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'),
            'created_at' => $row['created_at']
        ];
    }

    echo json_encode($posts);
} else {

    echo json_encode(["error" => "Failed to fetch posts"]);
}

$conn->close();
?>
