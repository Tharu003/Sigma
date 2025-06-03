<?php
include 'ad_home.php';
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$students = $conn->query("SELECT st_id, full_name FROM student");
$teachers = $conn->query("SELECT teacher_id, full_name FROM teacher");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $teacher_id = $_POST['teacher_id'];
    $subject_id = $_POST['subject_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $payment_month = $_POST['payment_month'];


    $stmt = $conn->prepare("SELECT name FROM subject WHERE subject_id = ?");
    $stmt->bind_param("i", $subject_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $subject_name = $result->fetch_assoc()['name'];
    $stmt->close();


    $stmt = $conn->prepare("INSERT INTO payment (student_id, teacher_id, subject, amount, payment_date, payment_month) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisdss", $student_id, $teacher_id, $subject_name, $amount, $payment_date, $payment_month);
    $stmt->execute();
    $stmt->close();

    $message = "✅ Payment saved successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Payment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
             .main-content {
        margin-left: 80px;
        margin-top: 60px;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }
.sidebar.active ~ .main-content {
        margin-left: 250px;
    }
        </style>
</head>
<body>
    <div class="main-content" id="mainContent">
<div class="container mt-4">
  <h3>Add Payment</h3>

  <?php if (!empty($message)): ?>
    <div class="alert alert-success"><?= $message ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Student</label>
      <select name="student_id" class="form-select" required>
        <option value="">Select Student</option>
        <?php while($row = $students->fetch_assoc()): ?>
          <option value="<?= $row['st_id'] ?>"><?= $row['full_name'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Teacher</label>
      <select name="teacher_id" id="teacher_id" class="form-select" required>
        <option value="">Select Teacher</option>
        <?php while($row = $teachers->fetch_assoc()): ?>
          <option value="<?= $row['teacher_id'] ?>"><?= $row['full_name'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Subject</label>
      <select name="subject_id" id="subject" class="form-select" required>
        <option value="">Select Subject</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Amount</label>
      <input type="number" name="amount" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Payment Date</label>
      <input type="date" name="payment_date" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Payment Month</label>
      <input type="text" name="payment_month" class="form-control" placeholder="e.g., June 2025" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit Payment</button>
  </form>
</div>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
$(document).ready(function() {
  $('#teacher_id').on('change', function() {
    var teacherId = $(this).val();
    if (teacherId) {
      $.ajax({
        url: 'get_subjects.php',
        type: 'GET',
        data: { teacher_id: teacherId },
        success: function(data) {
          $('#subject').html(data);
        }
      });
    } else {
      $('#subject').html('<option value="">Select Subject</option>');
    }
  });
});
</script>
</body>
</html>
