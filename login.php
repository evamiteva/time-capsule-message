<?php

$host = "localhost";
$username = "root";
$password = "usbw";
$database = "you_project";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashedPassword = sha1($password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Invalid username or password";
    }
}

