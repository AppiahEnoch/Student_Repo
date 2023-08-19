<?php
include "../db_connection.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get POST data and sanitize it
$indexNumber = isset($_POST['index_number']) ? $conn->real_escape_string(trim($_POST['index_number'])) : null;
$programme = isset($_POST['programme']) ? $conn->real_escape_string(trim($_POST['programme'])) : null;
$title = isset($_POST['title']) ? $conn->real_escape_string(trim($_POST['title'])) : null;
$year = isset($_POST['year']) ? $conn->real_escape_string(trim($_POST['year'])) : null;

// Initialize base SQL query
$sql = "SELECT * FROM projects";

// Add conditions only if at least one filter is not null
if ($indexNumber !== null || $programme !== null || $title !== null || $year !== null) {
    $sql .= " WHERE 1=1";
    if ($indexNumber !== null && $indexNumber !== "") {
        $sql .= " AND index_number LIKE '%$indexNumber%'";
    }
    if ($programme !== null && $programme !== "" && $programme !== "none") {
        $sql .= " AND study_program LIKE '%$programme%'";
    }
    if ($title !== null && $title !== "") {
        $sql .= " AND title LIKE '%$title%'";
    }
    if ($year !== null && $year !== "" && $year!== "none") {
        $sql .= " AND YEAR(defence_date) = '$year'";
    }
}

// The rest of the code remains the same



// Execute query and fetch results
$resultsQuery = $conn->query($sql);

// Initialize results array
$results = array();

// Check if query is successful, if not, handle error
if ($resultsQuery === false) {
    die("SQL Query Failed: " . $conn->error);
}
// Process results
while ($row = $resultsQuery->fetch_assoc()) {
    $actualFilePath = $row['file_path']; // Storing the actual file path
    $fileExtension = pathinfo($actualFilePath, PATHINFO_EXTENSION);

    if ($fileExtension == 'pdf') {
        $filePath = '../images/pdf.png';
    } elseif ($fileExtension == 'doc' || $fileExtension == 'docx') {
        $filePath = '../images/word.png';
    }

    $description = "The project titled '{$row['title']}' was submitted by {$row['stu_name']} with index number {$row['index_number']} from the {$row['faculty']} faculty. The department is '{$row['study_program']}' and the defence date was on " . date("F j, Y", strtotime($row['defence_date'])) . ".";

    $results[] = array(
        'filePath' => $filePath, // This is the image path for PDF or Word icon
        'actualFilePath' => $actualFilePath, // This is the actual file path for download
        'description' => $description
    );
}

header('Content-Type: application/json');
// Output results
echo json_encode($results);

$conn->close();
?>
