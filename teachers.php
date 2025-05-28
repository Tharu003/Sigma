<?php include "st_home.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sigma Teachers</title>
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
.teacher .filters-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 15px;
    margin: 0;
    position: sticky;
    top: 0;
    z-index: 100;
    background-color: #004aad;
    padding: 15px;
    box-shadow: 0 2px 5px #0000001a;
}
.teacher .filters {
    display: flex;
    align-items: center;
    gap: 10px;
}
.teacher .filter-input {
    flex: 0 1 200px;
    position: relative;
}

.card-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  padding: 20px;
}

.card {
  background-color: white;
  width: 250px;
  margin: 15px;
  border-radius: 15px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  overflow: hidden;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}
.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.2);
  background-color:rgb(117, 157, 185);
}

.card img {
  width: 100%;
  height: auto;
}

.card h3 {
  color: #b88c2c;
  font-weight: bold;
  margin: 10px 0 0;
}

.card p {
  font-weight: bold;
  color: black;
  margin: 5px 0 15px;
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
<div class="teacher">
    <div class="filters-container">
        <div class="filters">
            <div class="filter-input">
                <input type="text" placeholder="Filter by Name" >
            </div>
            <div class="filter-input">
                <input type="text" placeholder="Filter by Subject" >
            </div>
        </div>
    </div>

    <section class="card-container">
    <div class="card"> <a href="sinhalateacher.php" >
      <img src="images/suranjith.jpg" alt="Suranjith Vithanage">
      <h3>Suranjith Vithanage</h3>
      <p>Sinhala</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/ranil.jpg" alt="Ranil Gunarathne">
      <h3>Ranil Gunarathne</h3>
      <p>English</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/thilina.jpg" alt="Thilina Nayanajith">
      <h3>Thilina Nayanajith</h3>
      <p>ICT</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/thushara.jpg" alt="Thushara">
      <h3>Thushara</h3>
      <p>Business Studies</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/jagath.jpg" alt="Jagath Nilantha">
      <h3>Jagath Nilantha</h3>
      <p>History</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/shashika.jpg" alt="Shashika Jayawardhane">
      <h3>Shashika Jayawardhane</h3>
      <p>Dancing</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/ravindu.jpg" alt="Ravindu Maduranga">
      <h3>Ravindu Maduranga</h3>
      <p>Mathematics</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/saranga.jpg" alt="Saranga Piyumal">
      <h3>Saranga Piyumal</h3>
      <p>Science</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/maduranga.jpg" alt="Maduranga">
      <h3>Maduranga</h3>
      <p>Arts</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/nimali.jpg" alt="Nimali Mendis">
      <h3>Nimali Mendis</h3>
      <p>Music</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/darshi.jpg" alt="Darshi Nadeeshani">
      <h3>Darshi Nadeeshani</h3>
      <p>Primary English</p>
    </div>

    <div class="card"><a href="sinhalateacher.php" >
      <img src="images/sanjeewa.jpg" alt="K.A. Sanjeewa">
      <h3>K.A. Sanjeewa</h3>
      <p>3/4/5 Schoolership</p>
    </div>

  </section>
  </div>
  </div>
  </body>

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
