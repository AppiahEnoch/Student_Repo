<?php
include "../db_connection.php";

$sql = "SELECT DISTINCT study_program FROM projects ORDER BY study_program";
$result = $conn->query($sql);

$programmes = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $programmes[] = $row['study_program'];
    }
}

echo json_encode($programmes);

$conn->close();
?>
