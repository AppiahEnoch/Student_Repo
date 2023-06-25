<?php
include_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["query"])) {
  $query = $_GET["query"];

  // Execute a database query to search for student details based on the query
  $searchQuery = "%" . $query . "%";
  $stmt = mysqli_prepare($conn, "SELECT * FROM project WHERE stu_name LIKE ? OR index_number LIKE ?");
  mysqli_stmt_bind_param($stmt, "ss", $searchQuery, $searchQuery);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  // Fetch the search results from the database and store them in an array
  $results = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $results[] = $row;
  }

  // Return the results as JSON
  header("Content-Type: application/json");
  echo json_encode($results);
}
?>
