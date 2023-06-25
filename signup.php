<?php
include_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Perform database query to insert the user into the database
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        // Signup successful, redirect to login page
        header("Location: login.html");
        exit;
    } else {
        // Signup failed, display an error message
        echo "Signup failed. Please try again.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
