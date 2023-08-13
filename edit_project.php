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
    $project = mysqli_fetch_assoc($result);

    // Check if the form is submitted for updating the project
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = $_POST["id"];
      $indexNumber = $_POST["index_number"];
      $studentName = $_POST["stu_name"];
      $title = $_POST["title"];
      $faculty = $_POST["faculty"];
      $studyProgram = $_POST["study_program"];
      $defenceDate = $_POST["defence_date"];

      // Update the project details in the database
      $query = "UPDATE project SET id=?, index_number=?, stu_name=?, title=?, faculty=?, study_program=?, defence_date=? WHERE id=?";
      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "ssssssss", $id, $indexNumber, $studentName, $title, $faculty, $studyProgram, $defenceDate, $project_id);
      mysqli_stmt_execute($stmt);

      // Redirect back to the admin dashboard after successful update
      header("Location: admin_dashboard.php");
      exit;
    }
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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Project</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/upload.css">
</head>
<body>
  <header>
    <!-- Navbar code here -->
  </header>

  <main>
    <div class="container mt-5">
      <h2>Edit Project</h2>
      <form action="edit_project.php?id=<?php echo $project['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="id">ID:</label>
          <input type="text" id="id" name="id" value="<?php echo $project['id']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="index_number">Index Number:</label>
          <input type="text" id="index_number" name="index_number" value="<?php echo $project['index_number']; ?>" required>
        </div>
        <div class="form-group">
          <label for="stu_name">Student Name:</label>
          <input type="text" id="stu_name" name="stu_name" value="<?php echo $project['stu_name']; ?>" required>
        </div>
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" value="<?php echo $project['title']; ?>" required>
        </div>
        <div class="form-group">
          <label for="faculty">Faculty:</label>
          <select name="faculty" required>
            <option value="">Select Faculty</option>
            <option value="Faculty of Technical Education" <?php if ($project['faculty'] == 'Faculty of Technical Education') echo 'selected'; ?>>Faculty of Technical Education</option>
            <option value="Faculty of Business Education" <?php if ($project['faculty'] == 'Faculty of Business Education') echo 'selected'; ?>>Faculty of Business Education</option>
            <option value="Faculty of Applied Science and Mathematics Education" <?php if ($project['faculty'] == 'Faculty of Applied Science and Mathematics Education') echo 'selected'; ?>>Faculty of Applied Science and Mathematics Education</option>
            <option value="Faculty of Vocational Education" <?php if ($project['faculty'] == 'Faculty of Vocational Education') echo 'selected'; ?>>Faculty of Vocational Education</option>
            <option value="Faculty of Education and Communication Sciences" <?php if ($project['faculty'] == 'Faculty of Education and Communication Sciences') echo 'selected'; ?>>Faculty of Education and Communication Sciences</option>
          </select>
        </div>
        <div class="form-group">
          <label for="study_program">Department:</label>
          <select name="study_program" required>
            <option value="">Select Department</option>
            <!-- Add options for departments based on your database data -->
            <!-- Example: -->
            <option value="Department of InformationTechnology Education" <?php if ($project['study_program'] == 'Department of InformationTechnology Education') echo 'selected'; ?>>Department of Information Technology Education</option>
            <option value="Department of Mathematics Education" <?php if ($project['study_program'] == 'Department of Mathematics Education') echo 'selected'; ?>>Department of Mathematics Education</option>
            <option value="Department of Construction & Wood Technology Education" <?php if ($project['study_program'] == 'Department of Construction & Wood Technology Education') echo 'selected'; ?>>Department of Construction & Wood Technology Education</option>
            <option value="Department of Mechanical & Automotive Technology Education" <?php if ($project['study_program'] == 'Department of Mechanical & Automotive Technology Education') echo 'selected'; ?>>Department of Mechanical & Automotive Technology Education</option>
            <option value="Department of Electrical & Electronics Technology Education" <?php if ($project['study_program'] == 'Department of Electrical & Electronics Technology Education') echo 'selected'; ?>>Department of Electrical & Electronics Technology Education</option>
            <option value="Department of Hospitality and Tourism Education" <?php if ($project['study_program'] == 'Department of Hospitality and Tourism Education') echo 'selected'; ?>>Department of Hospitality and Tourism Education</option>
            <option value="Department of Fashion Design and Textiles Education" <?php if ($project['study_program'] == 'Department of Fashion Design and Textiles Education') echo 'selected'; ?>>Department of Fashion Design and Textiles Education</option>
          </select>
        </div>
        <!-- Begining of the upload form -->
        <section class="container">
          <h2>File Upload</h2>
          <div class="form-group">
            <label for="file">Choose a file:</label>
            <input type="file" id="file" name="file" required>
          </div>
        </section>
        <!-- End of the upload form -->
        <div class="form-group">
          <label for="defence_date">Year:</label>
          <input type="date" id="defence_date" name="defence_date" value="<?php echo $project['defence_date']; ?>" required>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Project">
        </div>
      </form>
    </div>
  </main>

  <footer>
    <!-- Footer code here -->
  </footer>

  <!-- JavaScript code -->
  <script src="script.js"></script>
  <script src="search.js"></script>

</body>
</html>
