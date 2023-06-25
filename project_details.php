<?php
include_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $indexNumber = $_POST["index_number"];
  $studentName = $_POST["stu_name"];
  $title = $_POST["title"];
  $faculty = $_POST["faculty"];
  $studyProgram = $_POST["study_program"];
  $defenceDate = $_POST["defence_date"];

  // Insert the details into the database
  $query = "INSERT INTO project (id, index_number, stu_name, title, faculty, study_program, defence_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssssss", $id, $indexNumber, $studentName, $title, $faculty, $studyProgram, $defenceDate);
  mysqli_stmt_execute($stmt);

  // Redirect to the upload page
  header("Location: upload.html");
  exit;
}

mysqli_close($conn);
?>
