<?php
include "../db_connection.php";

function getProjects() {
    global $conn;

    $query = "SELECT index_number, file_path,recdate FROM projects order by recdate desc";
    $result = mysqli_query($conn, $query);
    $projects = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $file_path = $row['file_path'];
            $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

            if ($file_extension == "docx" || $file_extension == "doc") {
                $row['file_type'] = "doc";
                $row['file_path'] = "../images/word.png";
            } elseif ($file_extension == "pdf") {
                $row['file_type'] = "pdf";
                $row['file_path'] = "../images/pdf.png";
            } else {
                $row['file_type'] = "unknown"; // default value if not one of the expected types
            }

            $projects[] = $row;
        }
    }

    return json_encode($projects);
}

echo getProjects();
?>
