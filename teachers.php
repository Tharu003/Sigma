<<<<<<< Updated upstream
<?php include "st_home.php"; ?>
<?php include "db.php"; ?>
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
        text-decoration: none;
        color: inherit;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        background-color: rgb(117, 157, 185);
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
        background-color: rgb(3, 3, 29);
        color: #ffffff;
        text-align: center;
        padding: 30px 20px;
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
    <div class="teacher">
      <div class="filters-container">
        <div class="filters">
          <div class="filter-input">
            <input type="text" placeholder="Filter by Name" id="nameFilter" class="form-control">
          </div>
          <div class="filter-input">
            <input type="text" placeholder="Filter by Subject" id="subjectFilter" class="form-control">
          </div>
        </div>
      </div>

      <section class="card-container" id="cardContainer">
        <?php
        $sql = "SELECT * FROM teachers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<a href="teacher_profile.php?id=' . $row['id'] . '" class="card">';
            echo '<img src="' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '">';
            echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
            echo '<p>' . htmlspecialchars($row['subject']) . '</p>';
            echo '</a>';
          }
        } else {
          echo '<p>No teachers found.</p>';
        }
        ?>
      </section>
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

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const nameInput = document.getElementById('nameFilter');
      const subjectInput = document.getElementById('subjectFilter');
      const cards = document.querySelectorAll('.card');

      function filterCards() {
        const nameVal = nameInput.value.toLowerCase();
        const subjectVal = subjectInput.value.toLowerCase();

        cards.forEach(card => {
          const name = card.querySelector('h3').textContent.toLowerCase();
          const subject = card.querySelector('p').textContent.toLowerCase();
          const match = name.includes(nameVal) && subject.includes(subjectVal);
          card.style.display = match ? 'block' : 'none';
        });
      }

      nameInput.addEventListener('input', filterCards);
      subjectInput.addEventListener('input', filterCards);
    });
  </script>
</body>
</html>
=======
>>>>>>> Stashed changes
