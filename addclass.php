<?php include "ad_home.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>add teacher</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }
    .main-content {
        margin-left: 0;
        margin-top: 60px;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    .card {
      background-color:rgb(230, 233, 220);
      max-width: 700px;
      height:auto;
      margin: auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 8px 8px 8px 8px rgba(0,0,0,0.1);
    }

    .card h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      border-radius:12px;
      background-color:rgb(235, 226, 237);
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .button-group button {
      flex: 1;
      padding: 10px;
      margin: 5px 5px;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      border-radius:15px;
    }

    .submit-btn {
      background-color:rgb(7, 125, 13); 
    }


    .clear-btn {
      background-color:rgb(239, 16, 31); 
    }

    .button-group button:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
 <div class="main-content" id="mainContent">
  <div class="card">
    <h2>Add Teacher</h2>
    <form id="teacherForm">
      <div class="form-group">
        <label for="teacherName">Name:</label>
        <input type="text" id="teacherName" name="teacherName" required>
      </div>
      <br>
      <div class="form-group">
        <label for="teacherEmail">Email:</label>
        <input type="email" id="teacherEmail" name="teacherEmail" required>
      </div>
      <br>
      <div class="form-group">
        <label for="teacherContact">Contact Number:</label>
        <input type="text" id="teacherContact" name="teacherContact" required>
      </div>
      <br>
      <div class="form-group">
        <label for="teacherdob">Date Of Birth:</label>
        <input type="date" id="teacherdob" name="teacherdob" required>
      </div>
      <br>
      <div class="form-group">
        <label for="teacheradd">Address:</label>
        <input type="text area" id="teacheradd" name="teacheradd" required>
      </div>
      <br>
      <div class="form-group">
        <label for="teacherpword">Password:</label>
        <input type="password" id="teacherpword" name="teacherpword" required>
      </div>
      <br>
      <div class="form-group">
        <label for="teacherQualification">Higher Qualification:</label>
        <input type="text" id="teacherQualification" name="teacherQualification" required>
      </div>
      <br>
      <br>
      <div class="button-group">
        <button type="submit" class="submit-btn">Submit</button>
        <button type="reset" class="clear-btn">Clear</button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
