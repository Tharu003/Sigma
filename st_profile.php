<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "st_home.php";

$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check for student_id in session
$student_id = $_SESSION['student_id'] ?? null;
if (!$student_id) {
    echo "<p>You must be logged in to view this page.</p>";
    exit;
}

// Fetch student info
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

// Fetch enrolled subjects and classes
$enroll_sql = "
    SELECT sub.name AS subject_name, cls.name AS class_name
    FROM St_select_sub ss
    JOIN Subject sub ON ss.subject_id = sub.subject_id
    LEFT JOIN Subject_For_Class sfc ON sub.subject_id = sfc.subject_id
    LEFT JOIN Class cls ON sfc.class_id = cls.class_id
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
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f4f4f4;
      padding: 40px;
      display: flex;
      justify-content: center;
    }

    .profile-card {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      max-width: 900px;
      width: 100%;
    }

    .profile-pic {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 20px;
      display: block;
    }

    h2 {
      text-align: center;
      color: #1c0b6c;
    }

    .info {
      font-size: 16px;
      color: #333;
      margin: 8px 0;
    }

    .info strong {
      color: #444;
    }

    .section-title {
      margin-top: 30px;
      font-size: 20px;
      font-weight: bold;
      color: #1c0b6c;
      border-bottom: 2px solid #ccc;
      padding-bottom: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    table th, table td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    table th {
      background-color: #f0f0f0;
    }

    .edit-btn {
      margin-top: 25px;
      padding: 10px 20px;
      background-color: #1c0b6c;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      display: inline-block;
      text-align: center;
    }

    .edit-btn:hover {
      background-color: #3c27a0;
    }
  </style>
</head>
<body>

<div class="profile-card">
  <!-- Optional: Add profile_pic if you include that column in the future -->
  <img src="uploads/default-profile.png" alt="Profile Picture" class="profile-pic">

  <h2><?= htmlspecialchars($student['full_name']) ?></h2>

  <p class="info"><strong>Email:</strong> <?= htmlspecialchars($student['email']) ?></p>
  <p class="info"><strong>WhatsApp:</strong> <?= htmlspecialchars($student['whatsapp_no']) ?></p>
  <p class="info"><strong>Address:</strong> <?= htmlspecialchars($student['address']) ?></p>
  <p class="info"><strong>Date of Birth:</strong> <?= htmlspecialchars($student['dob']) ?></p>
  <p class="info"><strong>Guardian:</strong> <?= htmlspecialchars($student['guardian_name']) ?> (<?= htmlspecialchars($student['guardian_contact']) ?>)</p>

  <div class="section-title">Enrolled Subjects & Classes</div>
  <table>
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

  <a href="edit_st_profile.php" class="edit-btn">Edit Profile</a>
</div>

</body>
</html>

<?php $conn->close(); ?>