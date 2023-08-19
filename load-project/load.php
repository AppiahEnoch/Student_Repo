


<?php
include "../db_connection.php";

$insert=0;

// Collect all the inputs
$index_number = mysqli_real_escape_string($conn, $_POST['index_number']);
$stu_name = mysqli_real_escape_string($conn, $_POST['stu_name']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$faculty = mysqli_real_escape_string($conn, $_POST['faculty']);
$study_program = mysqli_real_escape_string($conn, $_POST['study_program']);
$defence_date = mysqli_real_escape_string($conn, $_POST['defence_date']);

$file_path = uploadFileWithUniqueName('file',$index_number);

if ($file_path === false) {
    // Handle the error according to your requirements
    exit;
}

// Check if index number already exists
$query = "SELECT * FROM projects WHERE index_number = '$index_number'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Update the existing record
    $query = "UPDATE projects SET 
                stu_name = '$stu_name',
                title = '$title',
                faculty = '$faculty',
                study_program = '$study_program',
                file_path = '$file_path',
                defence_date = '$defence_date'
              WHERE index_number = '$index_number'";
} else {
    // Insert a new record
    $insert=1;
    $query = "INSERT INTO projects (index_number, stu_name, title, faculty, study_program, file_path, defence_date) 
              VALUES ('$index_number', '$stu_name', '$title', '$faculty', '$study_program', '$file_path', '$defence_date')";
}

// Execute the query
if (mysqli_query($conn, $query)) {
    // Success
    echo $insert;
} else {
    // Error
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}



function uploadFileWithUniqueName($input_name,$index_number, $target_dir = "../projectDocs/") {
    //$file_url = uploadFileWithUniqueName('material_file');

    if(isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0){
        // Get the extension of the file
        $file_extension = strtolower(pathinfo($_FILES[$input_name]["name"], PATHINFO_EXTENSION));
    
        // Check if the file extension is PDF or DOCX
        if($file_extension == "pdf" || $file_extension == "docx") {
            // Generate a unique ID
            $unique_id = bin2hex(openssl_random_pseudo_bytes(16));

            // add generateCode() to $unique_id
            $unique_id =  $index_number. $unique_id . generateCode();
        
            // Create a new filename with the unique ID
            $new_filename = $unique_id . '.' . $file_extension;
        
            // Full path to the new file
            $new_file_path = $target_dir . $new_filename;
        
            // Move the uploaded file to the new location
            if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $new_file_path)) {
                // Return the relative path
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



















