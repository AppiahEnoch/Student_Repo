<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if a file was uploaded
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
      // File is valid, move it to the desired location
      $targetDir = "Uploads/ITE/ITE";
      $targetFile = $targetDir . basename($fileName);
      
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
}
?>
