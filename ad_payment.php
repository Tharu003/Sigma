<?php
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getStudents($conn) {
    $result = $conn->query("SELECT st_id, full_name FROM Student");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getSubjectsForStudent($conn, $st_id) {
    $sql = "SELECT 
              s.subject_id, s.name AS name, 
              t.teacher_id, t.name AS full_name
            FROM st_select_sub ss
            JOIN subject s ON ss.subject_id = s.subject_id
            JOIN teach_sub_reg ts ON s.subject_id = ts.subject_id
            JOIN teacher t ON ts.teacher_id = t.teacher_id
            WHERE ss.st_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $st_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_payment'])) {
    $student_id = $_POST['student_id'];
    $month = $_POST['month'];
    $payments = $_POST['payment'];

    foreach ($payments as $subject_id => $data) {
        $teacher_id = $data['teacher_id'];
        $amount = $data['amount'];

        if (!empty($amount)) {
            $stmt = $conn->prepare("INSERT INTO Payment (st_id, teacher_id, subject_id, payment_amount, month, date)
                                    VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("iiids", $student_id, $teacher_id, $subject_id, $amount, $month);
            $stmt->execute();
        }
    }
    echo "<script>alert('Payments recorded successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Payment Management</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; padding: 40px; }
    .container { background: #fff; border-radius: 12px; padding: 30px; max-width: 900px; margin: auto; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    h2 { text-align: center; margin-bottom: 30px; color: #2c3e50; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 10px; border-bottom: 1px solid #ccc; text-align: center; }
    th { background: #f4f6f8; }
    input[type="number"] { width: 80px; padding: 5px; }
    select, button { padding: 8px 12px; border-radius: 6px; margin-bottom: 20px; }
    button { background: #2ecc71; color: white; border: none; cursor: pointer; }
    button:hover { background: #27ae60; }
    .section { margin-bottom: 40px; }
  </style>
  <script>
    function fetchSubjects() {
      const studentId = document.getElementById("student_id").value;
      const month = document.getElementById("month").value;
      window.location.href = `admin_payment.php?student_id=${studentId}&month=${month}`;
    }
  </script>
</head>
<body>
  <div class="container">
    <h2>Admin Payment Panel</h2>
    <form method="GET">
      <div class="section">
        <label>Select Student:</label>
        <select id="student_id" name="student_id" onchange="fetchSubjects()">
          <option value="">-- Select --</option>
          <?php
          $students = getStudents($conn);
          foreach ($students as $student) {
              $selected = isset($_GET['student_id']) && $_GET['student_id'] == $student['st_id'] ? "selected" : "";
              echo "<option value='{$student['st_id']}' $selected>{$student['full_name']}</option>";
          }
          ?>
        </select>

        <label>Month:</label>
        <select id="month" name="month" onchange="fetchSubjects()">
          <option value="">-- Select --</option>
          <?php
          $months = ["January", "February", "March", "April", "May", "June",
                     "July", "August", "September", "October", "November", "December"];
          foreach ($months as $m) {
              $selected = isset($_GET['month']) && $_GET['month'] == $m ? "selected" : "";
              echo "<option value='$m' $selected>$m</option>";
          }
          ?>
        </select>
      </div>
    </form>

    <?php if (isset($_GET['student_id']) && isset($_GET['month'])): 
      $subjects = getSubjectsForStudent($conn, $_GET['student_id']);
      if ($subjects):
    ?>
    <form method="POST">
      <input type="hidden" name="student_id" value="<?= $_GET['student_id'] ?>">
      <input type="hidden" name="month" value="<?= $_GET['month'] ?>">

      <table>
        <tr>
          <th>Subject</th>
          <th>Teacher</th>
          <th>Amount</th>
        </tr>
        <?php foreach ($subjects as $s): ?>
          <tr>
            <td><?= htmlspecialchars($s['subject_name']) ?></td>
            <td><?= htmlspecialchars($s['teacher_name']) ?></td>
            <td>
              <input type="number" name="payment[<?= $s['subject_id'] ?>][amount]" step="0.01">
              <input type="hidden" name="payment[<?= $s['subject_id'] ?>][teacher_id]" value="<?= $s['teacher_id'] ?>">
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      <button type="submit" name="submit_payment">Submit Payment</button>
    </form>
    <?php else: echo "<p>No subjects found for this student.</p>"; endif; endif; ?>

    <div class="section">
      <h3>All Teacher Payment Records</h3>
      <table>
        <tr>
          <th>Teacher</th>
          <th>Subject</th>
          <th>Student</th>
          <th>Amount</th>
          <th>Month</th>
          <th>Date</th>
        </tr>
        <?php
        $query = "SELECT p.*, s.full_name AS full_name, sub.name AS name, t.name AS full_name 
                  FROM Payment p
                  JOIN student s ON p.st_id = s.st_id
                  JOIN subject sub ON p.subject_id = sub.subject_id
                  JOIN teacher t ON p.teacher_id = t.teacher_id
                  ORDER BY p.date DESC";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['full_name']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['payment_amount']}</td>
                    <td>{$row['month']}</td>
                    <td>{$row['date']}</td>
                  </tr>";
        }
        ?>
      </table>
    </div>
  </div>
</body>
</html>