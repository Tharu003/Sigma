<?php
include "st_home.php";
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sigma_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_id = $_GET['st_id']; 


$sql_student = "SELECT * FROM student WHERE st_id = ?";
$stmt = $conn->prepare($sql_student);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$res_student = $stmt->get_result();
$student = $res_student->fetch_assoc();


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
  <style>
body {
  background-color: #f0f2f5;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 1000px;
  margin: auto;
  padding: 30px 20px;
}


.card1, .card2, .card3 {
  border-radius: 16px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
  padding: 25px;
  margin-bottom: 30px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  color: rgb(3, 3, 3);
  width: 900px;
}


.card1 {
  background:rgb(217, 220, 223);
}
.card1 input[readonly], .card1 textarea[readonly] {
  background-color:rgb(248, 248, 248);
  border: 1px solid #a0c9f8;
  border-radius: 6px;
  padding: 8px;
  width: 100%;
  box-sizing: border-box;
  color: rgb(3, 3, 3);
}


.card2 {
  min-width: 300px;
  background:rgb(217, 220, 223);
}

.card3 {
  background:rgb(217, 220, 223);
}



.card1:hover, .card2:hover, .card3:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
}


.card1 h2, .card2 h2, .card3 h2 {
  font-size: 1.7rem;
  color:rgb(3, 3, 3);
  margin-bottom: 15px;
}


.card1 p, .card2 li, .card3 td, .card3 th {
  font-size: 1rem;
  line-height: 1.6;
  color: rgb(3, 3, 3);
}

ul {
  list-style-type: disc;
  padding-left: 20px;
  margin: 0;
}


.card3 table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
  color: #fff;
}

.card3 th,
.card3 td {
  border: 1px solid rgba(255, 255, 255, 0.3);
  padding: 10px;
  text-align: left;
}

.card3 th {
  background-color: rgba(255, 255, 255, 0.2);
}


@media (max-width: 768px) {
  .card1, .card2, .card3 {
    padding: 20px;
  }

  .card3 table, .card3 thead, .card3 tbody, .card3 th, .card3 td, .card3 tr {
    display: block;
  }

  .card3 tr {
    margin-bottom: 15px;
  }

  .card3 td {
    position: relative;
    padding-left: 50%;
  }

  .card3 td::before {
    position: absolute;
    top: 10px;
    left: 10px;
    width: 45%;
    white-space: nowrap;
    font-weight: bold;
    color: #fff;
  }

  .card3 td:nth-child(1)::before { content: "Subject"; }
  .card3 td:nth-child(2)::before { content: "Teacher"; }
  .card3 td:nth-child(3)::before { content: "Amount"; }
  .card3 td:nth-child(4)::before { content: "Date"; }
  .card3 td:nth-child(5)::before { content: "Month"; }
}
</style>

</head>
<body>

<div class="container">
  

  <form action="student_update.php" method="post" class="card1" id="studentForm">
  <h2>👤 Student Info</h2>

  <input type="hidden" name="st_id" value="<?= htmlspecialchars($student['st_id']) ?>">

  <label for="full_name"><strong>Name:</strong></label><br>
  <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($student['full_name']) ?>" readonly><br><br>

  <label for="address"><strong>Address:</strong></label><br>
  <textarea id="address" name="address" rows="3" readonly><?= htmlspecialchars($student['address']) ?></textarea><br><br>

  <label for="dob"><strong>DOB:</strong></label><br>
  <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($student['dob']) ?>" readonly><br><br>

  <label for="whatsapp_no"><strong>WhatsApp:</strong></label><br>
  <input type="text" id="whatsapp_no" name="whatsapp_no" value="<?= htmlspecialchars($student['whatsapp_no']) ?>" readonly><br><br>

  <label for="guardian_name"><strong>Guardian:</strong></label><br>
  <input type="text" id="guardian_name" name="guardian_name" value="<?= htmlspecialchars($student['guardian_name']) ?>" readonly><br>

  <label for="guardian_contact"><strong>Guardian Contact:</strong></label><br>
  <input type="text" id="guardian_contact" name="guardian_contact" value="<?= htmlspecialchars($student['guardian_contact']) ?>" readonly><br><br>

  <label for="email"><strong>Email:</strong></label><br>
  <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" readonly><br><br>

  <button type="button" id="editBtn">Edit</button>
  <button type="submit" id="saveBtn" style="display:none;">Save</button>
  <button type="button" id="cancelBtn" style="display:none;">Cancel</button>
</form>



  
  <div class="card2">
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
      
  
  <div class="card3">
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
              <td><?= htmlspecialchars($row['payment_month']) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="5">No payments found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>
<script>
  const form = document.getElementById('studentForm');
  const editBtn = document.getElementById('editBtn');
  const saveBtn = document.getElementById('saveBtn');
  const cancelBtn = document.getElementById('cancelBtn');

  editBtn.addEventListener('click', () => {
    
    Array.from(form.elements).forEach(el => {
      if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
        if (el.type !== 'hidden') el.readOnly = false;
      }
    });
    editBtn.style.display = 'none';
    saveBtn.style.display = 'inline-block';
    cancelBtn.style.display = 'inline-block';
  });

  cancelBtn.addEventListener('click', () => {
    
    location.reload();
  });
</script>

</body>
</html>
