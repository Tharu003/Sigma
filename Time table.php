<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Time Table</title>
  <style>
    .card-container {
  display: flex;
  gap: 20px;
  padding: 20px;
  flex-wrap: wrap;
}

.card {
  background: #f8fffd;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  padding: 20px;
  width: 300px;
  font-family: Arial, sans-serif;
}

.sub {
  font-weight: bold;
  color: #555;
}

.label {
  font-weight: bold;
  display: inline-block;
  width: 100px;
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
[3:53 PM, 5/31/2025] ChatGPT: .card {
  width: 400px;
  background: #f1fdfb;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  padding: 20px;
  margin: auto;
  font-family: Arial, sans-serif;
  text-align: left;
}

.card h2 {
  margin: 0 0 15px;
}

.sub {
  font-size: 14px;
  color: #666;
  font-weight: normal;
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

.pagination {
  display: flex;
  justify-content: center;
  gap: 5px;
  margin-top: 20px;
}
[3:53 PM, 5/31/2025] ChatGPT: .pagination a, .pagination span {
  padding: 8px 12px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 5px;
  text-decoration: none;
  color: #333;
}

.pagination .active {
  background: #007bff;
  color: white;
  border-color: #007bff;
}
  </style>
</head>
<body>

 [3:36 PM, 5/31/2025] ChatGPT: <div class="card-container">
  <!-- Card 1 -->
  <div class="card">
    <h2>Physics</h2>
    <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
    <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
    <p><span class="label medium">🌐 Medium</span> Sinhala</p>
    <p><span class="label day">📅 Day</span> Monday</p>
    <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
    <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
  </div>

  <!-- Card 2 -->
  <div class="card">
    <h2>Physics</h2>
    <p class="sub">2027-THEORY | PHYSICAL</p>
    <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
    <p><span class="label medium">🌐 Medium</span> Sinhala</p>
    <p><span class="label day">📅 Day</span> Tuesday</p>
    <p><span class="label time">⏰ Time</span> 3:00 PM - 8:00 PM</p>
    <p class="note">SPECIAL GROUP CLASS (Sinhala/English Medium)</p>
  </div>

  <!-- Card 3 -->
  <div class="card">
    <h2>Physics</h2>
    <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
    <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
[3:36 PM, 5/31/2025] ChatGPT: <p><span class="label medium">🌐 Medium</span> Sinhala</p>
    <p><span class="label day">📅 Day</span> Sunday</p>
    <p><span class="label time">⏰ Time</span> 1:00 PM - 5:30 PM</p>
    <p class="note">MASS (Permanent Time) Sinhala/English Medium</p>
     <h2>Physics</h2>
    <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
    <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
    <p><span class="label medium">🌐 Medium</span> Sinhala</p>
    <p><span class="label day">📅 Day</span> Monday</p>
    <p><span class="label time">⏰ Time</span> 7:00 AM - 12:00 PM</p>
    <p class="note">MASS (Temporary Time) Sinhala/English Medium</p>
  </div>

  <!-- Card 2 -->
  <div class="card">
    <h2>Physics</h2>
    <p class="sub">2027-THEORY | PHYSICAL</p>
    <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
    <p><span class="label medium">🌐 Medium</span> Sinhala</p>
    <p><span class="label day">📅 Day</span> Tuesday</p>
    <p><span class="label time">⏰ Time</span> 3:00 PM - 8:00 PM</p>
    <p class="note">SPECIAL GROUP CLASS (Sinhala/English Medium)</p>
  </div>

  <!-- Card 3 -->
  <div class="card">
    <h2>Physics</h2>
    <p class="sub">2027-THEORY | PHYSICAL & ONLINE</p>
    <p><span class="label lecturer">👨‍🏫 Lecturer</span> Amith Pussella</p>
[3:36 PM, 5/31/2025] ChatGPT: <p><span class="label medium">🌐 Medium</span> Sinhala</p>
    <p><span class="label day">📅 Day</span> Sunday</p>
    <p><span class="label time">⏰ Time</span> 1:00 PM - 5:30 PM</p>
    <p class="note">MASS (Permanent Time) Sinhala/English Medium</p>
     <h2>Science For Technology <span class="sub">2025-THEORY | PHYSICAL</span></h2>
  <p><span class="label lecturer">👨‍🏫 Lecturer</span> Jeewan Balasooriya</p>
  <p><span class="label medium">🌐 Medium</span> Sinhala</p>
  <p><span class="label day">📅 Day</span> Sunday</p>
  <p><span class="label time">⏰ Time</span> 1:00 PM - 4:00 PM</p>
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


</body>
</html>