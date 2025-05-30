<?php
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php include "st_home.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Our Teachers</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f6fa;
      padding: 20px;
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
    h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 40px;
    }

    .teacher-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
      padding: 10px;
    }

    .teacher-card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      transition: transform 0.2s;
      cursor: pointer;
    }

    .teacher-card:hover {
      transform: scale(1.03);
    }

    .teacher-card h3 {
      color: #2980b9;
    }

    .teacher-card p {
      color: #555;
      margin: 8px 0;
    }

    .teacher-card a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>
<body><div class="main-content" id="mainContent">
<h2>Meet Our Teachers</h2>

<div class="teacher-grid">
  <?php
  $result = $conn->query("SELECT * FROM teacher");
  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "
        <a href='teacher_profile.php?teacher_id={$row['teacher_id']}'>
          <div class='teacher-card'>
            <h3>{$row['full_name']}</h3>
            <p><strong>Qualification:</strong> {$row['qualification']}</p>
            <p><strong>Email:</strong> {$row['email']}</p>
          </div>
        </a>
      ";
    }
  } else {
    echo "<p>No teachers available at the moment.</p>";
  }
  $conn->close();
  ?>
</div>

</body>
</html>