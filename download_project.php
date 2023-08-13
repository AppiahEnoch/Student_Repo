<?php
// Include the database connection file
include_once "db_connection.php";

if (isset($_GET["id"])) {
  $projectId = $_GET["id"];
  // Fetch the project details from the database based on the project ID
  $query = "SELECT * FROM project WHERE id = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $projectId);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  
  if ($row = mysqli_fetch_assoc($result)) {
    // Download the project file
    $filePath = $row['file_path'];
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");
    readfile($filePath);
    exit;
  } else {
    echo "Project not found.";
  }
}

mysqli_close($conn);
?>
