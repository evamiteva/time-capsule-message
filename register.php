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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['Regpassword']);

    $hashedPassword = sha1($password);

    //$checkQuery = "SELECT * FROM users WHERE username = '$username'";

    //$checkResult = mysqli_query($conn, $checkQuery);

    // if ($checkResult && mysqli_num_rows($checkResult) > 0) {
    //     echo "User with this email already exists.";
    // } else {
        $insertQuery = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$hashedPassword')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            echo "Registration successful. You can now log in.";
        } else {
            echo "Registration failed. Please try again.";
        }
    // }
}
