<?php include "st_home.php";
?>
<?php
$conn = new mysqli("localhost", "root", "", "sigma_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM teacher";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Our Teachers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .teacher-container {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: center;
        }
        .teacher-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 250px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease;
        }
        .teacher-card:hover {
            transform: translateY(-5px);
        }
        .teacher-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .teacher-card h3 {
            margin: 10px 0 5px;
            color: #222;
        }
        .teacher-card p {
            color: #666;
            margin: 0 0 10px;
        }
        .teacher-card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
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
      footer {
      background-color: rgb(3, 3, 29);
      color: #ffffff;
      text-align: center;
      padding: 30px 20px;
      font-size: 16px;
      margin-top: 60px;
    }
    footer .footer-links a {
      color: #ffffff;
      margin: 0 15px;
      text-decoration: none;
      font-weight: 500;
    }
    footer .footer-links a:hover {
      text-decoration: underline;
    }
    </style>
</head>
<body>
<div class="main-content" id="mainContent">
<h2 style="text-align:center;">Our Teachers</h2>
<div class="teacher-container">
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $imagePath = "uploads/" . htmlspecialchars($row['photo']);
        echo "<div class='teacher-card'>
                <img src='$imagePath' alt='Teacher Photo'>
                <h3>" . htmlspecialchars($row['full_name']) . "</h3>
                <p>" . htmlspecialchars($row['qualification']) . "</p>
                <a href='teacher_profile.php?teacher_id=" . $row['teacher_id'] . "'>View Profile</a>
              </div>";
    }
} else {
    echo "<p>No teachers available.</p>";
}
$conn->close();
?>
</div>
</div>
<br>
 <footer>
    <div class="footer-links mb-2">
      <a href="index.php">Home</a> |
      <a href="about.php">About</a> |
      <a href="contact.php">Contact</a> |
      <a href="privacy.php">Privacy</a>
    </div>
    <div>&copy; <?= date("Y") ?> Sigma Institute. All rights reserved.</div>
  </footer>
</body>
</html>