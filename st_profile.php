<?php
// DB Connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sigma_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_id = $_GET['st_id']; // Or use session

// ==========================
// Fetch Student Info
// ==========================
$sql_student = "SELECT * FROM student WHERE st_id = ?";
$stmt = $conn->prepare($sql_student);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$res_student = $stmt->get_result();
$student = $res_student->fetch_assoc();

// ==========================
// Fetch Enrolled Subjects
// ==========================
$sql_enroll = "
  SELECT s.name AS subject_name, c.grade AS class_name, r.year
  FROM register r
  JOIN subject s ON r.subject_id = s.subject_id
  JOIN class c ON r.class_id = c.class_id
  WHERE r.st_id = ?
";
$stmt = $conn->prepare($sql_enroll);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$res_enroll = $stmt->get_result();

// ==========================
// Fetch Payment History
// ==========================
$sql_payment = "
  SELECT s.name AS subject_name, t.full_name AS teacher_name, p.amount, p.payment_date, p.payment_month
  FROM payment p
  JOIN subject s ON p.subject = s.subject_id
  JOIN teacher t ON p.teacher_id = t.teacher_id
  WHERE p.student_id = ?
";
$stmt = $conn->prepare($sql_payment);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$res_payment = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Profile</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

  <!-- 🔹 Student Info -->
  <div class="card">
    <h2>👤 Student Info</h2>
    <p><strong>Name:</strong> <?= htmlspecialchars($student['full_name']) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($student['address']) ?></p>
    <p><strong>DOB:</strong> <?= htmlspecialchars($student['dob']) ?></p>
    <p><strong>WhatsApp:</strong> <?= htmlspecialchars($student['whatsapp_no']) ?></p>
    <p><strong>Guardian:</strong> <?= htmlspecialchars($student['guardian_name']) ?> (<?= htmlspecialchars($student['guardian_contact']) ?>)</p>
    <p><strong>Email:</strong> <?= htmlspecialchars($student['email']) ?></p>
  </div>

  <!-- 🔹 Enrolled Subjects -->
  <div class="card">
    <h2>📚 Enrolled Subjects</h2>
    <ul>
      <?php if ($res_enroll->num_rows > 0): ?>
        <?php while ($row = $res_enroll->fetch_assoc()): ?>
          <li><?= htmlspecialchars($row['subject_name']) ?> – <?= htmlspecialchars($row['class_name']) ?> (<?= $row['year'] ?>)</li>
        <?php endwhile; ?>
      <?php else: ?>
        <li>No subjects enrolled.</li>
      <?php endif; ?>
    </ul>
  </div>

  <!-- 🔹 Payment History -->
  <div class="card">
    <h2>💳 Payment History</h2>
    <table>
      <thead>
        <tr>
          <th>Subject</th>
          <th>Teacher</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Month</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($res_payment->num_rows > 0): ?>
          <?php while ($row = $res_payment->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['subject_name']) ?></td>
              <td><?= htmlspecialchars($row['teacher_name']) ?></td>
              <td>Rs. <?= htmlspecialchars($row['amount']) ?></td>
              <td><?= htmlspecialchars($row['payment_date']) ?></td>
              <td><?= htmlspecialchars($row['payment_mont']) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="5">No payments found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>

</body>
</html>
