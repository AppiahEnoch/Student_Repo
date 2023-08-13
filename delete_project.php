<?php
include_once "db_connection.php";

// Check if project ID is provided in the URL
if (isset($_GET['id'])) {
  $project_id = $_GET['id'];

  // Fetch the project details from the database based on the provided ID
  $query = "SELECT * FROM project WHERE id = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $project_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Check if a project with the given ID exists
  if (mysqli_num_rows($result) > 0) {
    // Perform the deletion operation
    $query = "DELETE FROM project WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $project_id);
    mysqli_stmt_execute($stmt);

    // Redirect back to the admin dashboard after successful deletion
    header("Location: admin_dashboard.php");
    exit;
  } else {
    // If no project with the given ID exists, redirect to admin dashboard or show an error message
    header("Location: admin_dashboard.php");
    exit;
  }
} else {
  // If project ID is not provided, redirect to admin dashboard or show an error message
  header("Location: admin_dashboard.php");
  exit;
}

// Close the database connection
mysqli_close($conn);
?>
