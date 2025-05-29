<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize inputs
    $full_name = $conn->real_escape_string($_POST['teacherName']);
    $email = $conn->real_escape_string($_POST['teacherEmail']);
    $contact_no = $conn->real_escape_string($_POST['teacherContact']);
    $dob = $conn->real_escape_string($_POST['teacherdob']);
    $address = $conn->real_escape_string($_POST['teacheradd']);
    $password = password_hash($_POST['teacherpword'], PASSWORD_DEFAULT);  // Hash password
    $qualification = $conn->real_escape_string($_POST['teacherQualification']);
    
    // Insert query
    $sql = "INSERT INTO teacher (full_name, email, contact_no, dob, address, password, qualification) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssss", $full_name, $email, $contact_no, $dob, $address, $password, $qualification);

    if ($stmt->execute()) {
        // Redirect after success
        header("Location: manageteacher.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
