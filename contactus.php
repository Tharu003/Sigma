<?php include "st_home.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>

   .main-content {
        margin-left: 0;
        margin-top: 60px;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    .sidebar.active ~ .main-content {
    margin-left: 250px;
    }
.image-container {
  position: relative;
  width: 100%;
  height: 600px;
  overflow: hidden;
}

.image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.overlay-text {
  position: absolute;
  bottom: 190px; 
  left: 30%;
  transform: translateX(-50%);
  color: black;
  font-size: 36px;
}
.overlay-text h4{
    font-family:Poppins medium;
    font-size:15px;
}
.overlay-text h1 {
   font-size:40px;
   font-family:Arial Black;
}
.overlay-text p{
    font-family:Poppins medium;
    font-size:15px;
}
body {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', sans-serif;
  background: #fff;
 
}

.about-section {
  display: flex;
  align-items: center;
  justify-content: center;

  padding: 50px 30px;
  flex-wrap: wrap;
  gap: 60px;
 
}

.image-area {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
} 

























footer {
      background-color:rgb(3, 3, 29);
      color: #ffffff;
      text-align: center;
      padding: 30px 20px;
      font-size: 16px;
      position: relative;
      z-index: 999; 
      transform: none !important;
      perspective: none !important;
      transform-style: flat !important;
      isolation: isolate;
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
    <div class="image-container">
    <img src="images/contactus.jpg" width="100%"height="600px">
   <div class="overlay-text">
    <h4>Home > Contact</h4>
    <h1>Contact Us</h1>
    <p>Get in touch with us</p>
    
</div>
</div>
</body>
</html>