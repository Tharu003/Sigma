<?php
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['teacher_id'])) {
    echo "Invalid request.";
    exit();
}

$teacher_id = intval($_GET['teacher_id']);
$stmt = $conn->prepare("SELECT * FROM teacher WHERE teacher_id = ?");
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();
$teacher = $result->fetch_assoc();

if (!$teacher) {
    echo "Teacher not found.";
    exit();
}
?>
<?php include "st_home.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Teacher Profile</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f4f4f4;
      padding: 40px;
      display: flex;
      justify-content: center;
    }
    .main-content {
      margin-left: 80px;
      margin-top: 60px;
      padding: 20px;
      transition: margin-left 0.3s ease;
    }
    .sidebar.active ~ .main-content {
      margin-left: 250px;
    }

    .profile-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
      padding: 80px;
      max-width: 1000px;
      width: 100%;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 20px;
      text-align: center;
    }

    .info {
      margin: 10px 0;
      font-size: 16px;
      color: #333;
    }

    .info strong {
      color: #555;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #2980b9;
    }
  </style>
</head>
<body>
  <div class="main-content" id="mainContent">

<div class="profile-card">
  <img src="uploads/<?= htmlspecialchars($teacher['photo']) ?>" alt="Teacher Photo" style="width: 300px;height:400px; border-radius: 12px;">
  <h2><?= htmlspecialchars($teacher['full_name']) ?></h2>

  <p class="info"><strong>Email:</strong> <?= htmlspecialchars($teacher['email']) ?></p>
  <p class="info"><strong>Contact:</strong> <?= htmlspecialchars($teacher['contact_no']) ?></p>
  <p class="info"><strong>Address:</strong> <?= htmlspecialchars($teacher['address']) ?></p>
  <p class="info"><strong>Date of Birth:</strong> <?= htmlspecialchars($teacher['dob']) ?></p>
  <p class="info"><strong>Qualification:</strong> <?= htmlspecialchars($teacher['qualification']) ?></p>

  <a href="teachers.php">← Back to Teachers</a>
</div>
  </div>
</body>
</html>