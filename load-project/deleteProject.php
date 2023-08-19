<?php
include "../db_connection.php";

if (isset($_POST['index_number'])) {
    $index_number = mysqli_real_escape_string($conn, $_POST['index_number']);

    // Retrieve the file path for the given index number
    $query = "SELECT file_path FROM projects WHERE index_number = '$index_number'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $file_path = $row ? $row['file_path'] : null;

    if ($file_path && file_exists($file_path)) {
        // Delete the file from the project folder
        unlink($file_path);
    }

    // Now, delete the record from the database
    $query = "DELETE FROM projects WHERE index_number = '$index_number'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete record']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Index number not provided']);
}
?>
