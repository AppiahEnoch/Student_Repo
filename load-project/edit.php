<?php
include "../db_connection.php";
$file_path = null;
$response = array();

if (isset($_POST['index_number'], $_POST['stu_name'], $_POST['title'], $_POST['faculty'], $_POST['study_program'], $_POST['defence_date'])) {
    $index_number = mysqli_real_escape_string($conn, $_POST['index_number']);
    $stu_name = mysqli_real_escape_string($conn, $_POST['stu_name']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
    $study_program = mysqli_real_escape_string($conn, $_POST['study_program']);
    $defence_date = mysqli_real_escape_string($conn, $_POST['defence_date']);

    // Retrieve the existing file path
// Retrieve the existing file path
$query = "SELECT file_path FROM projects WHERE index_number = '$index_number'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$old_file_path = $row ? $row['file_path'] : null;

if ($old_file_path) {
    // Check if the file extension is PDF, DOC, or DOCX
    $file_extension = strtolower(pathinfo($old_file_path, PATHINFO_EXTENSION));
    if ($file_extension === "pdf" || $file_extension === "doc" || $file_extension === "docx") {
        $file_path = uploadFileWithUniqueName('file', $index_number);

        // If a new file was uploaded, delete the old file
        if ($file_path && $old_file_path) {
            unlink($old_file_path);
        }
    } else {
        // If the file extension is not valid, you can handle it as needed
        $response['success'] = false;
        $response['error'] = "Invalid file type";
    }
}


    // If file path is updated, update the file path, otherwise keep the old one
    $file_path_query = $file_path ? "file_path = '$file_path'," : '';

    // Update the existing record
    $query = "UPDATE projects SET 
                stu_name = '$stu_name',
                title = '$title',
                faculty = '$faculty',
                study_program = '$study_program',
                $file_path_query
                defence_date = '$defence_date'
              WHERE index_number = '$index_number'";

    if (mysqli_query($conn, $query)) {
      $response['success'] = true;
    } else {
      $response['success'] = false;
      $response['error'] = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    $response['success'] = false;
    $response['error'] = "Required fields are missing";
}

echo json_encode($response);

function uploadFileWithUniqueName($input_name, $index_number, $target_dir = "../projectDocs/") {
    if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0) {
        $file_extension = strtolower(pathinfo($_FILES[$input_name]["name"], PATHINFO_EXTENSION));
        if ($file_extension == "pdf" || $file_extension == "docx") {
            $unique_id = $index_number . bin2hex(openssl_random_pseudo_bytes(16)) . generateCode();
            $new_filename = $unique_id . '.' . $file_extension;
            $new_file_path = $target_dir . $new_filename;
            if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $new_file_path)) {
                return $new_file_path;
            }
        }
    }
    return false;
}

function generateCode() {
    $seed = md5(uniqid(mt_rand(), true));
    $characters = '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $charIndex = hexdec(substr($seed, $i, 1)) % $charactersLength;
        $randomString .= $characters[$charIndex];
    }
    return $randomString;
}
?>
