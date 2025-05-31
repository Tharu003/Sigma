<?php include "st_home.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Time Table</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .main-content {
      margin-left: 0;
      margin-top: 60px;
      padding: 20px;
      transition: margin-left 0.3s ease;
    }

    .sidebar.active ~ .main-content {
      margin-left: 250px;
    }

    .card-container {
      display: flex;
      gap: 20px;
      padding: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .card {
      background: #f8fffd;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 20px;
      width: 350px;      /* Card width */
      min-height: 250px; /* Minimum height */
      box-sizing: border-box;
      font-family: Arial, sans-serif;
      text-align: left;
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .card h2 {
      margin: 0 0 15px 0;
      color: #162057;
    }

    .sub {
      font-size: 14px;
      color: #666;
      font-weight: normal;
      margin-bottom: 10px;
    }

    .label {
      font-weight: bold;
      display: inline-block;
      width: 120px;
    }

    .lecturer { color: #3f51b5; }
    .medium   { color: #009688; }
    .day      { color: #9c27b0; }
    .time     { color: #f9a825; }

    .note {
      margin-top: 10px;
      color: red;
      font-weight: bold;
    }

    .pagination {
      display: flex;
      justify-content: center;
      gap: 5px;
      margin-top: 20px;
      padding-bottom: 40px;
    }

    .pagination a, .pagination span {
      padding: 8px 12px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      text-decoration: none;
      color: #333;
      cursor: pointer;
      user-select: none;
    }

    .pagination .active {
      background: #007bff;
      color: white;
      border-color: #007bff;
      cursor: default;
    }
      footer {
      background-color: rgb(3, 3, 29);
      color: #ffffff;
      text-align: center;
      padding: 30px 30px;
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
    <div class="card-container">

      <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>
        <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>
        <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>
        <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>
        <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>
        <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>
        <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>
        <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Monday</p>
        <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
        <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
      </div>

      <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Tuesday</p>
        <p><span class="label time">⏰ Time</span> 3:00 PM - 8:00 PM</p>
        <p class="note">SPECIAL GROUP CLASS (Sinhala/English Medium)</p>
      </div>

      <div class="card">
        <h2>Physics</h2>
        <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Sunday</p>
        <p><span class="label time">⏰ Time</span> 1:00 PM - 5:30 PM</p>
        <p class="note">MASS (Permanent Time) Sinhala/English Medium</p>
      </div>

      <div class="card">
        <h2>Science For Technology <span class="sub">2025-THEORY | PHYSICAL</span></h2>
        <p><span class="label lecturer">👨‍🏫 Lecturer</span> Jeewan Balasooriya</p>
        <p><span class="label medium">🌐 Medium</span> Sinhala</p>
        <p><span class="label day">📅 Day</span> Sunday</p>
        <p><span class="label time">⏰ Time</span> 1:00 PM - 4:00 PM</p>
      </div>

    </div>

    <div class="pagination">
      <a href="#">‹</a>
      <a href="#">1</a>
      <span>…</span>
      <a href="#">41</a>
      <a href="#">42</a>
      <a href="#" class="active">43</a>
      <a href="#">›</a>
    </div>
  </div>
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
