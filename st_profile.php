<?php
session_start();
include "st_home.php";


$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$student_id = $_SESSION['student_id'] ?? null;
if (!$student_id) {
  echo "<p>You must be logged in to view this page.</p>";
  exit;
}


$student_sql = "SELECT * FROM Student WHERE st_id = ?";
$stmt = $conn->prepare($student_sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$student_result = $stmt->get_result();
$student = $student_result->fetch_assoc();

if (!$student) {
  echo "<p>Student not found.</p>";
  exit;
}


$enroll_sql = "
  SELECT s.name AS subject_name, c.name AS class_name
  FROM St_select_sub ss
  JOIN Subject s ON ss.subject_id = s.subject_id
  LEFT JOIN Subject_For_Class sc ON s.subject_id = sc.subject_id
  LEFT JOIN Class c ON sc.class_id = c.class_id
  WHERE ss.st_id = ?
";
$stmt = $conn->prepare($enroll_sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$enrollments = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .profile-card {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      margin: 40px auto;
      max-width: 800px;
    }
    .profile-pic {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
    }
    .table {
      margin-top: 20px;
    }
    h2 {
      color: #1c0b6c;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="profile-card text-center">
    <img src="<?= isset($student['profile_pic']) ? 'uploads/' . htmlspecialchars($student['profile_pic']) : 'uploads/default-profile.png' ?>" alt="Profile Picture" class="profile-pic">
    <h2><?= htmlspecialchars($student['full_name']) ?></h2>
    <p><strong>Email:</strong> <?= htmlspecialchars($student['email']) ?></p>
    <p><strong>WhatsApp:</strong> <?= htmlspecialchars($student['whatsapp_no']) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($student['address']) ?></p>
    <p><strong>Date of Birth:</strong> <?= htmlspecialchars($student['dob']) ?></p>
    <p><strong>Guardian:</strong> <?= htmlspecialchars($student['guardian_name']) ?> (<?= htmlspecialchars($student['guardian_contact']) ?>)</p>

    <hr>

    <h4>Enrolled Subjects & Classes</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Subject</th>
          <th>Class</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($enrollments->num_rows > 0) {
          while ($row = $enrollments->fetch_assoc()) {
            echo "<tr>
              <td>" . htmlspecialchars($row['subject_name']) . "</td>
              <td>" . htmlspecialchars($row['class_name'] ?? "Not Assigned") . "</td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='2'>No enrolled subjects found.</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <a href="edit_st_profile.php" class="btn btn-primary mt-3">Edit Profile</a>
  </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
