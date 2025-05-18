<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Roboto", sans-serif;
        }

        header {
            position: fixed;
            background: white;
            padding: 10px 20px;
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
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
            margin: 0;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 900;
        }

        .right_area i {
            margin-right: 10px;
        }

        .right_area span {
            margin-left: 5px; 
        }

        .logout_btn {
            padding: 5px 15px;
            color: white;
            background: darkblue;
            text-decoration: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: 600;
            transition: 0.5s;
        }

        .logout_btn:hover {
            background: red;
        }

        .sidebar {
            background: #f8f9fa;
            position: fixed;
            top: 60px;
            left: -250px;
            width: 250px;
            height: 100%;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar a {
            display: block;
            color: blue;
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.3s ease;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            background: blue;
            color: white;
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
        
            <div class="dropdown">
                <i class="fas fa-user-circle user_icon dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"></i>
                <span>User</span>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Log Out</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="sidebar" id="sidebar">
        <a href="#"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="#"><i class="fas fa-users-cog"></i><span>About Us</span></a>
        <a href="#"><i class="fas fa-users-cog"></i><span>Teachers</span></a>
        <a href="#"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarBtn = document.getElementById('sidebar_btn');

        sidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
   
</body>
</html>