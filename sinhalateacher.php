<?php include "st_home.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Suranjith Vithanage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      background-color: #f8f9fa;
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
    .card {
      display: flex;
      flex-direction: row;
      border: none;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      margin: 20px auto;
      max-width: 1000px;
    }

    .card img {
      width: 300px;
      height: auto;
      object-fit: cover;
    }

    .card-body {
      background-color: #111;
      color: white;
      padding: 20px;
      flex: 1;
    }

    .card-body h1 {
      margin-top: 0;
      font-size: 2rem;
      text-decoration: none;
    }

    .card-body p {
      margin: 10px 0;
    }

    .card-body span {
      font-weight: bold;
    }

    .icons {
      display: flex;
      justify-content: ;
      margin-top: 20px;
    }

    .icons a img {
      width: 30px;
      margin: 0 10px;
    }

    .nav-tabs {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .nav-tabs button {
      background: #3d2aa7;
      color: white;
      border: none;
      padding: 10px 20px;
      margin: 0 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .nav-tabs button:first-child {
      background: #c117b6;
    }

    footer {
      background-color: rgb(3, 3, 29);
      color: #ffffff;
      text-align: center;
      padding: 30px 0px;
      font-size: 16px;
      position: relative;
      z-index: 999;
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
  <div class="container">
    <div class="card">
      <img src="images/suranjith.jpg" alt="Suranjith Vithanage" />
      <div class="card-body">
        <h1>Suranjith Vithanage</h1>
        <p><span>Subject:</span> Sinhala</p>
        <p><span>Grade:</span> 6 to 11</p>
        <p><span>Medium:</span> Sinhala</p>
        <p><span>Experience:</span> 7 years</p>
        <p><span>Classes:</span> Theory, Revision, Paper Classes</p>
      </div>
    </div>

    <div class="icons">
<a href="https://www.instagram.com/yourprofile" class="fa fa-instagram"></a>

<a href="https://www.youtube.com/yourchannel" class="fa fa-youtube"></a>

<a href="https://www.twitter.com/yourprofile" class="fa fa-twitter"></a>

    </div>

    <nav class="nav-tabs">
      <button>ABOUT</button>
      <button>TIMETABLES</button>
      <button>TUTES</button>
      <button>VIDEOS</button>
    </nav>
  </div>
</div>

  </br>
  </br>

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
