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

  <body>
<div class="teacher">
    <div class="filters-container">
        <div class="filters">
            <div class="filter-input">
                <input type="text" placeholder="Filter by Name" value>
            </div>
            <div class="filter-input">
                <input type="text" placeholder="Filter by Subject" value>
            </div>
        </div>
    </div>

    <section class="card-container">
    <div class="card">
      <img src="images/amith.png" alt="Amith Pussella">
      <h3>Amith Pussella</h3>
      <p>Science</p>
    </div>

    <div class="card">
      <img src="images/tissa.png" alt="Tissa Jananayake">
      <h3>Tissa Jananayake</h3>
      <p>Matematics</p>
    </div>

    <div class="card">
      <img src="images/amith.png" alt="Chandika Jayamaha">
      <h3>Chandika Jayamaha</h3>
      <p>English</p>
    </div>

    <div class="card">
      <img src="images/tissa.png" alt="Kelum Senanayaka">
      <h3>Kelum Senanayaka</h3>
      <p>Information Technoloy</p>
    </div>

    <div class="card">
      <img src="images/tissa.png" alt="Kelum Senanayaka">
      <h3>Kelum Senanayaka</h3>
      <p>Tamil</p>
    </div>

    <div class="card">
      <img src="images/tissa.png" alt="Kelum Senanayaka">
      <h3>Kelum Senanayaka</h3>
      <p>History</p>
    </div>

    <div class="card">
      <img src="images/tissa.png" alt="Kelum Senanayaka">
      <h3>Kelum Senanayaka</h3>
      <p>Sinhala</p>
    </div>

  </section>
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

 
  <script>
    const counters = document.querySelectorAll('.count');
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = Math.ceil(target / 50);

        if (count < target) {
          counter.innerText = count + increment;
          setTimeout(updateCount, 20);
        } else {
          counter.innerText = target + "+";
        }
      };
      updateCount();
    });
  </script>

</body>
</html>
