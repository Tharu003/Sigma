<?php
<<<<<<< HEAD
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
=======
include "db.php";

$teacher_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM teachers WHERE id = ?";
$stmt = $conn->prepare($sql);
>>>>>>> 0309faf3187e50fd23a0ddabef78d74bc2dfa97e
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();
$teacher = $result->fetch_assoc();

if (!$teacher) {
<<<<<<< HEAD
    echo "Teacher not found.";
    exit();
}
?>
<?php include "st_home.php";
?>
=======
    echo "<h2>Teacher not found.</h2>";
    exit;
}
?>
>>>>>>> 0309faf3187e50fd23a0ddabef78d74bc2dfa97e

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<<<<<<< HEAD
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
      padding: 30px;
      max-width: 600px;
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
=======
  <title><?= htmlspecialchars($teacher['name']) ?> - Sigma Teacher Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        background-color: #f7f9fc;
        padding-top: 60px;
    }

    .profile-container {
        max-width: 800px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        text-align: center;
    }

    .profile-container img {
        width: 200px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    h2 {
        color: #004aad;
        font-weight: bold;
    }

    p {
        font-size: 18px;
        color: #333;
>>>>>>> 0309faf3187e50fd23a0ddabef78d74bc2dfa97e
    }
  </style>
</head>
<body>
<<<<<<< HEAD
  <div class="main-content" id="mainContent">

<div class="profile-card">
  <h2><?= htmlspecialchars($teacher['full_name']) ?></h2>

  <p class="info"><strong>Email:</strong> <?= htmlspecialchars($teacher['email']) ?></p>
  <p class="info"><strong>Contact:</strong> <?= htmlspecialchars($teacher['contact_no']) ?></p>
  <p class="info"><strong>Address:</strong> <?= htmlspecialchars($teacher['address']) ?></p>
  <p class="info"><strong>Date of Birth:</strong> <?= htmlspecialchars($teacher['dob']) ?></p>
  <p class="info"><strong>Qualification:</strong> <?= htmlspecialchars($teacher['qualification']) ?></p>

  <a href="teachers.php">← Back to Teachers</a>
</div>
  </div>
=======

<div class="profile-container">
  <img src="<?= htmlspecialchars($teacher['image']) ?>" alt="<?= htmlspecialchars($teacher['name']) ?>">
  <h2><?= htmlspecialchars($teacher['name']) ?></h2>
  <p><strong>Subject:</strong> <?= htmlspecialchars($teacher['subject']) ?></p>
  
</div>

>>>>>>> 0309faf3187e50fd23a0ddabef78d74bc2dfa97e
</body>
</html>