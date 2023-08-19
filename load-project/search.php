<?php
include "../db_connection.php";


$indexNumber = $_POST['indexNumber'];

if (is_numeric($indexNumber) && strlen($indexNumber) == 10) {
  $stmt = $conn->prepare("SELECT * FROM projects WHERE index_number = ?");
  $stmt->bind_param('s', $indexNumber);
  $stmt->execute();
  $result = $stmt->get_result();
  $record = $result->fetch_assoc();

  echo json_encode($record);
}
?>
