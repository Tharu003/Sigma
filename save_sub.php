<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from POST and sanitize
    $subjectid = $conn->real_escape_string($_POST['subid']);
    $subjectname = $conn->real_escape_string($_POST['subname']);

    if (!empty($subjectid) && !empty($subjectname)) {
        // Insert into DB
        $sql = "INSERT INTO subject (subject_id, name) VALUES ('$subjectid', '$subjectname')";
        if ($conn->query($sql) === TRUE) {
            // Redirect or show success message
            header("Location: managesubject.php?msg=success");
            exit();
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
