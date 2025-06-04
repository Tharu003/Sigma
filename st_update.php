<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sigma_db";

if (isset($_GET['update']) && $_GET['update'] === 'success') {
    echo '<p style="color: green; font-weight: bold;">Student details updated successfully!</p>';
}

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $st_id = (int)$_POST['st_id'];
    $full_name = $conn->real_escape_string(trim($_POST['full_name']));
    $address = $conn->real_escape_string(trim($_POST['address']));
    $dob = $conn->real_escape_string(trim($_POST['dob']));
    $whatsapp_no = $conn->real_escape_string(trim($_POST['whatsapp_no']));
    $guardian_name = $conn->real_escape_string(trim($_POST['guardian_name']));
    $guardian_contact = $conn->real_escape_string(trim($_POST['guardian_contact']));
    $email = $conn->real_escape_string(trim($_POST['email']));

    
    $sql_update = "UPDATE student SET 
        full_name = ?, 
        address = ?, 
        dob = ?, 
        whatsapp_no = ?, 
        guardian_name = ?, 
        guardian_contact = ?, 
        email = ? 
        WHERE st_id = ?";

    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sssssssi", $full_name, $address, $dob, $whatsapp_no, $guardian_name, $guardian_contact, $email, $st_id);

    if ($stmt->execute()) {
        
        header("Location: student_profile.php?st_id=$st_id&update=success");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}
?>
