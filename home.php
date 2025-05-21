<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sigma Institute</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      position: relative;
      min-height: 100vh;
      background-image: url('images/home.jpg'); /* Replace with your image path */
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Overlay for better text readability */
    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
       background-color: rgba(255, 255, 255, 0.6); 
      
      z-index: 0;
    }

    .content {
      position: relative;
      z-index: 1;
      padding-top: 250px;
      padding-bottom: 100px;
    }

    h1 {
      color: black;
      font-size: 8rem;
      font-weight: 600;
      text-align: center;
      margin-bottom: 20px;
    }

    .btn-secondary {
      background-color: rgb(40, 4, 46);
      border: none;
      padding: 15px 30px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 30px;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    .btn-secondary:hover {
      background-color: rgb(31, 145, 165);
    }

    @media (max-width: 576px) {
      h1 {
        font-size: 2.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container content">
    <h1>Sigma Institute</h1>
    <div class="row justify-content-center">
      <div class="col-md-3 col-sm-6 mb-3">
        <button onclick="location.href='login.php'" class="btn btn-secondary">Student</button>
      </div>
      <div class="col-md-3 col-sm-6 mb-3">
        <button onclick="location.href='login.php'" class="btn btn-secondary">Teacher</button>
      </div>
    </div>
  </div>
</body>
</html>
