<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sigma Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Roboto", sans-serif;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 60px;
      background: white;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .left_area {
      display: flex;
      align-items: center;
    }

    .left_area img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .left_area h3 {
      color: darkblue;
      margin: 0;
      text-transform: uppercase;
      font-size: 22px;
      font-weight: 900;
    }

    #sidebar_btn {
      font-size: 24px;
      color: darkblue;
      cursor: pointer;
      margin-right: 955px;
    }

    .right_area {
      display: flex;
      align-items: center;
      color: darkblue;
      font-size: 18px;
      font-weight: 700;
    }

    .sidebar {
      background: #f8f9fa;
      position: fixed;
      top: 0;
      left: -250px;
      width: 250px;
      height: 100%;
      padding-top: 60px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      transition: left 0.3s ease;
      z-index: 999;
    }

    .sidebar.active {
      left: 0;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 15px 20px;
      text-decoration: none;
      font-size: 18px;
    }

    .sidebar a:hover {
      background:blue;
      color: white;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      position: relative;
    }

    .sidebar ul li a,
    .dropdown-btn {
      display: flex;
      align-items: center;
      padding: 12px 20px;
      text-decoration: none;
      color: blue;
      background-color:rgb(255, 255, 255);
      border: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      font-size: 16px;
    }

    .sidebar ul li a:hover,
    .dropdown-btn:hover {
      background-color:blue;
      color:white;
    }

    .submenu {
      display: none;
      color:white;
    }

    .submenu li a {
      padding-left: 40px;
      color:white;
    }

    .submenu li a:hover {
      background-color:blue;
    }

    .fas {
      margin-right: 10px;
    }
    .sidebar ul dropdown{
        color:white;
    }
  </style>
</head>
<body>

  <header>
    <div class="left_area">
      <img src="images/logo.png" alt="Logo">
      <h3>Sigma</h3>
    </div>
    <i class="fas fa-bars" id="sidebar_btn"></i>
    <div class="right_area">
      <i class="fas fa-user-circle"></i> <span style="margin-left: 10px;">User</span>
    </div>
  </header>

  <div class="sidebar" id="sidebar">
  <ul>
    <li><a href="st_dashboard.php"><i class="fas fa-home"></i> Home</a></li>

    <li class="dropdown">
      <button id="dropdownBtn" class="dropdown-btn">
        <i class="fas fa-user-tie"></i> Teachers <i class="fas fa-chevron-down"></i>
      </button>
      <ul class="submenu" id="dropdownMenu" style="display: none;">
  <li><a href="class.php"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Add Teachers</a></li>
  <li><a href="class.php"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Manage Teachers</a></li>
</ul>

    </li>

<li class="dropdown">
  <button id="dropdownBtn1" class="dropdown-btn">
    <i class="fas fa-user-tie"></i> Classes <i class="fas fa-chevron-down"></i>
  </button>
  <ul class="submenu" id="dropdownMenu1" style="display: none;">
    <li><a href="addclass.php"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Add Class</a></li>
    <li><a href="manageclass.php"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Manage Class</a></li>
  </ul>
</li>

<li class="dropdown">
  <button id="dropdownBtn2" class="dropdown-btn">
    <i class="fas fa-book"></i> Subjects <i class="fas fa-chevron-down"></i>
  </button>
  <ul class="submenu" id="dropdownMenu2" style="display: none;">
    <li><a href="#"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Add Subject</a></li>
    <li><a href="#"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Manage Subject</a></li>
  </ul>
</li>

<li class="dropdown">
  <button id="dropdownBtn3" class="dropdown-btn">
    <i class="fas fa-money-bill"></i> Payment <i class="fas fa-chevron-down"></i>
  </button>
  <ul class="submenu" id="dropdownMenu3" style="display: none;">
    <li><a href="#"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Add Payment</a></li>
    <li><a href="#"><i class="fas fa-circle" style="font-size: 8px; margin-right: 8px;"></i> Manage Payment</a></li>
  </ul>
</li>
<li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
    <li><a href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>

</div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const sidebar = document.getElementById('sidebar');
const sidebarBtn = document.getElementById('sidebar_btn');

sidebarBtn.addEventListener('click', () => {
  sidebar.classList.toggle('active');
});

  
  const dropdowns = document.querySelectorAll('.dropdown');

  dropdowns.forEach(dropdown => {
    const button = dropdown.querySelector('.dropdown-btn');
    const menu = dropdown.querySelector('.submenu');

    button.addEventListener('click', () => {
      const isVisible = menu.style.display === 'block';
      // Close all submenus first
      document.querySelectorAll('.submenu').forEach(sub => sub.style.display = 'none');
      // Toggle current
      menu.style.display = isVisible ? 'none' : 'block';
    });
  });





  </script>

</body>
</html>
