<?php
// Include the database connection file
include_once "db_connection.php";

// Check if the search query parameter is set
if (isset($_GET["query"])) {
  $searchQuery = $_GET["query"];
  // Write the search query to fetch matching projects from the database
  $query = "SELECT * FROM project WHERE title LIKE '%$searchQuery%' OR faculty LIKE '%$searchQuery%' OR study_program LIKE '%$searchQuery%' OR defence_date LIKE '%$searchQuery%'";
  $result = mysqli_query($conn, $query);

  // Display the search results
  echo "<h2>Search Results</h2>";
  echo "<ul>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>{$row['title']} - {$row['faculty']} - {$row['study_program']} - {$row['defence_date']} <a href=\"{$row['file_path']}\" target=\"_blank\">View</a> | <a href=\"{$row['file_path']}\" download>Download</a></li>";
  }
  echo "</ul>";
}

mysqli_close($conn);
?>
