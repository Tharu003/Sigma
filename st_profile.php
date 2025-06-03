
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Profile</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
  font-family: 'Segoe UI', sans-serif;
  background: #fff;
  padding: 40px;
  display: flex;
  justify-content: center;
}

.main-content {
  margin-top: 20px;
  width: 100%;
  max-width: 1200px;
}

.profile-card {
  display: flex;
  background: #000;
  color: white;
  border-radius: 12px;
  box-shadow: 0 6px 18px rgba(0,0,0,.2);
  padding: 40px;
  gap: 40px;
}

.profile-card img {
  width: 280px;
  height: 380px;
  border-radius: 12px;
  object-fit: cover;
  border: 3px solid #fff;
}

.profile-details {
  flex: 1;
}

.profile-details h2 {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 25px;
}

.info {
  margin: 12px 0;
  font-size: 18px;
  display: flex;
  align-items: center;
}

.info strong {
  width: 160px;
  display: inline-block;
  color: #ccc;
}

.badge {
  display: inline-block;
  background: #9b59b6;
  color: #fff;
  padding: 6px 14px;
  border-radius: 20px;
  margin: 5px 8px 0 0;
  font-size: 14px;
}

a {
  display: inline-block;
  margin-top: 30px;
  text-decoration: none;
  color: #00aaff;
}

  </style>
</head>
<body>
  <div class="main-content">
    <div class="profile-card">
      <img src="uploads/<?= htmlspecialchars($student['photo']) ?>" alt="Student Photo">

      <div class="profile-details">
        <h2><?= htmlspecialchars($student['full_name']) ?></h2>

        <p class="info"><strong>Student ID:</strong> <?= htmlspecialchars($student['student_index']) ?></p>
        <p class="info"><strong>Contact:</strong> <?= htmlspecialchars($student['contact_no']) ?></p>
        <p class="info"><strong>Grade:</strong> <?= htmlspecialchars($student['grade']) ?></p>
        <p class="info"><strong>Stream:</strong> <?= htmlspecialchars($student['stream']) ?></p>
        <p class="info"><strong>Enrolled Year:</strong> <?= htmlspecialchars($student['enroll_year']) ?></p>
        <p class="info"><strong>Status:</strong> <?= htmlspecialchars($student['status']) ?></p>

        <div class="info"><strong>Subjects:</strong><br>
          

        <a href="students.php">← Back to Students</a>
      </div>
    </div>
  </div>
</body>
</html>
