<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sigma_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['full_name'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $whatsapp = $_POST['whatsapp_no'];
    $guardian = $_POST['guardian_name'];
    $guardian_contact = $_POST['guardian_contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO student (full_name, address, dob, whatsapp_no, guardian_name, guardian_contact, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $address, $dob, $whatsapp, $guardian, $guardian_contact, $email, $password);

 if ($stmt->execute()) {
    echo "Data inserted successfully.";

    header("Location: st_dashboard.php"); 
   

    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }


}
?>
