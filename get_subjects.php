<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$teacher_id = $_GET['teacher_id'] ?? 0;

$sql = "SELECT s.subject_id, s.name 
        FROM teach_sub_reg tsr
        JOIN subject s ON tsr.subject_id = s.subject_id
        WHERE tsr.teacher_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();

echo '<option value="">Select Subject</option>';
while($row = $result->fetch_assoc()) {
    echo "<option value='{$row['subject_id']}'>{$row['name']}</option>";
}
$stmt->close();
$conn->close();
?>
