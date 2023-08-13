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
    // Display the project details
    echo "<h2>{$row['title']}</h2>";
    echo "<p>{$row['faculty']} - {$row['study_program']} - {$row['defence_date']}</p>";
    
    // Provide a link to view the project file
    echo "<a href=\"{$row['file_path']}\" target=\"_blank\">View Project</a>";
  } else {
    echo "Project not found.";
  }
}

mysqli_close($conn);
?>
