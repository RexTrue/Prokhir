<?php
include "../config.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql_check = "SELECT * FROM user WHERE username = ? OR email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ss", $username, $email);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    echo "Error: Username or Email already exists. Please choose a different one.";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt_insert->execute()) {
        header("Location: ../frontEnd/login.html");
        exit;
    } else {
        echo "Error: " . $stmt_insert->error;
    }

    $stmt_insert->close();
}

$stmt_check->close();
$conn->close();
?>
