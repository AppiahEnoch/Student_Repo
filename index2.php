<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Projects</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="project_details.html">Upload</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li class="search-bar">
          <input type="text" id="searchInput" placeholder="Search...">
          <button onclick="search()">Search</button>
          <div id="searchResults"></div>
        </li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <?php
      if (isset($_GET['department'])) {
        $selectedDepartment = $_GET['department'];
        echo "<h1>Projects for $selectedDepartment</h1>";

        // TODO: Establish a database connection
        // TODO: Implement a function to fetch projects from the database based on the selected department
        // For example, replace the below placeholders with the actual database query and result handling:

        // Placeholder data to demonstrate the display
        $projects = fetch_projects_from_database($selectedDepartment);

        if (!empty($projects)) {
          foreach ($projects as $project) {
            echo "<div class='project-item'>";
            echo "<h3>" . $project['project_name'] . "</h3>";
            echo "<p>" . $project['project_description'] . "</p>";
            echo "</div>";
          }
        } else {
          echo "No projects found for the selected department.";
        }
      } else {
        echo "<h1>No department selected.</h1>";
      }
      ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 MARTIN ANAD DENIS PROJECT (AAMUSTED-K)</p>
  </footer>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.
