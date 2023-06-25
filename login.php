<?php
include_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    var_dump($username);
    var_dump($password);

    // Perform database query to fetch user details
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Verify the entered password with the stored hashed password
        if (password_verify($password, $row['password'])) {
            // Password is correct, redirect to index.html
            header("Location: index.html");
            exit;
        }
    }

    // Invalid username or password, display an error message
    echo "Invalid username or password.";
}

mysqli_close($conn);
?>
