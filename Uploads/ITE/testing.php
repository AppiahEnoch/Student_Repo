<?php
include_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form credentials
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

  // Get the uploaded file details
  if (isset($_FILES["file"])) {
    $file = $_FILES["file"];

    // File details
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileSize = $file["size"];
    $fileTemp = $file["tmp_name"];

    // Allowed file types
    $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

    // Maximum file size in bytes (5MB)
    $maxFileSize = 5 * 1024 * 1024;

    // Check file type and size
    if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
      // Determine the target directory based on the selected department
      $targetDir = "Uploads/";

      if ($studyProgram === "Department of InformationTechnology Education") {
        $targetDir .= "Uploads/ITE/ITE";
      } elseif ($studyProgram === "Department of Mathematics Education") {
        $targetDir .= "Department2/";
      } elseif ($studyProgram === "Department of Construction & Wood Technology Education") {
        $targetDir .= "Department3/";
      }
      // Add more conditions as needed for other departments

      // Combine the target directory and file name
      $targetFile = $targetDir . basename($fileName);

      // Move the file to the target directory
      if (move_uploaded_file($fileTemp, $targetFile)) {
        // File upload success
        echo "File uploaded successfully!";
      } else {
        // File upload failed
        echo "Failed to upload file.";
      }
    } else {
      // Invalid file type or size
      echo "Invalid file. Only PDF or Word documents up to 5MB are allowed.";
    }
  }

  // Redirect to the next page (adjust the page name as needed)
  header("Location: next_page.html");
  exit;
}

mysqli_close($conn);
?>
