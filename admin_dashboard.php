<?php
// admin_dashboard.php

// Assuming you have a database connection in db_connection.php
include_once "db_connection.php";

// Handle the search functionality
if (isset($_GET['search']) && !empty($_GET['search'])) {
  $search = $_GET['search'];
  // Modify the query to include the search condition
  $query = "SELECT * FROM project WHERE 
            id LIKE '%$search%' OR 
            index_number LIKE '%$search%' OR 
            stu_name LIKE '%$search%' OR 
            title LIKE '%$search%' OR 
            faculty LIKE '%$search%' OR 
            study_program LIKE '%$search%' OR 
            defence_date LIKE '%$search%'";
} else {
  // Default query to fetch all projects
  $query = "SELECT * FROM project";
}

// Fetch the projects from the database
$result = mysqli_query($conn, $query);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/admin.css">
</head>
<body>
  <header>
    <!-- Navbar code here -->
  </header>

  
        <main>
    <div class="container mt-5">
    <h2>Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-6">
                <!-- Upload Project button -->
                <a href="testing.html" class="btn btn-primary">Upload Project</a>
            </div>
            <div class="col-md-6">
                <!-- Search bar -->
                <form action="admin_dashboard.php" method="get" class="d-flex">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Search projects" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2">Search</button>
                </form>
            </div>
        </div>
      
      <!-- Project listings -->
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Index Number</th>
            <th>Student Name</th>
            <th>Title</th>
            <th>Faculty</th>
            <th>Department</th>
            <th>Year</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['index_number']; ?></td>
              <td><?php echo $row['stu_name']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['faculty']; ?></td>
              <td><?php echo $row['study_program']; ?></td>
              <td><?php echo $row['defence_date']; ?></td>
              <td>
                <!-- Edit button to edit the project -->
                <a href="edit_project.php?id=<?php echo $row['id']; ?>">Edit</a>
                <!-- Delete button to delete the project (you can add confirmation if needed) -->
                <a href="delete_project.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>

     



  <footer>
    <!-- Footer code here -->
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
