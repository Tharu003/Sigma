<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background-color: rgba(243, 235, 235, 0.53); 
      background-repeat: no-repeat;
      background-size: cover;
      font-family: 'Inter', sans-serif;
     
    }

    h1 {
      text-align: center;
      font-size: 3rem;
      color: black;
      font-family: cooper-black;

    }

    .form-container {
    
      background-color: rgba(162, 170, 170, 0.53); 
      border: 1px solid rgba(0, 0, 0, 0.2);      
      box-shadow: 0 30px 30px rgba(0, 0, 0, 0.5); 
      padding: 60px;
      border-radius: 12px;
      max-width: 700px; 
      margin: 80px auto; 
      


    }

    .form-title {
      color:rgb(5, 5, 5);
      font-weight: 600;
      margin-bottom: 25px;
      font-size: 26px;
      text-align: center;
    }

    .form-group label {
      font-weight: 500;
      color: black;
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin-bottom: 5px;
    }

    .form-control {
      background-color:rgb(247, 247, 247); 
      color:rgb(15, 15, 15);         
      border-radius: 8px;
      padding: 10px 12px;
      font-size: 14px;
      border: 1px solid #ccc;
      box-shadow: none;
      transition: all 0.3s;
  padding-left: 40px;
    }

    .form-control:focus {
      border-color:rgb(228, 15, 25);
      box-shadow: 0 0 0 0.1rem rgba(226, 175, 218, 0.25);
    }

    .btn-secondary {
      background-color:rgb(40, 4, 46);
      border: none;
      padding: 10px 30px;
      font-size: 15px;
      font-weight: 600;
      border-radius: 30px;
      transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
      background-color:rgb(31, 145, 165);
    }

    .text-center a {
      color:blue;
      font-size: 14px;
      
    }

    .text-center a:hover {
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      .form-container {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
<form action="logdata.php" method="POST">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="form-container">
        <h1><b>Class Registration </h1></b>
        <br>
        <form method="post" id="form">
         <div class="form-group position-relative">
  <span class="position-absolute" style="top: 10px; left: 15px; color: gray;">

  </span>
  <lable>Subject Id</lable><br><br>
  <input type="text" required class="form-control pl-5" id="sub_id" name="sub_id" placeholder="Enter Subject Id">
</div>

<div class="form-group position-relative">
  <span class="position-absolute" style="top: 10px; left: 15px; color: gray;">
  </span>
   <lable>Subject Name</lable><br><br>
  <input type="password" required class="form-control pl-5 pr-5" id="name" name="name" placeholder="Enter Your Name">
  <span class="position-absolute" style="top: 10px; right: 15px; cursor: pointer;" onclick="togglePassword()">
  </span>
</div>


          <div class="text-center mt-4">
            <button type="submit" class="btn btn-secondary px-4">Submit</button>
          </div>


         
        </form>
  

</body>
</html>
