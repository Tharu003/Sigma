<?php
include "db.php";

$teacher_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM teachers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $teacher_id);
$stmt->execute();
$result = $stmt->get_result();
$teacher = $result->fetch_assoc();

if (!$teacher) {
    echo "<h2>Teacher not found.</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
    }
  </style>
</head>
<body>

<div class="profile-container">
  <img src="<?= htmlspecialchars($teacher['image']) ?>" alt="<?= htmlspecialchars($teacher['name']) ?>">
  <h2><?= htmlspecialchars($teacher['name']) ?></h2>
  <p><strong>Subject:</strong> <?= htmlspecialchars($teacher['subject']) ?></p>
  
</div>

</body>
</html>