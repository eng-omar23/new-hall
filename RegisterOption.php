<?php include('nav.php'); ?>

<!DOCTYPE html>
<html>
<style>
      body{
          margin-top: 5%;
      }
    .container {
      margin-top: 5%;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      background-color: #f8f9fa;
      border: none;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
      text-align: center;
    }

    .card-text {
      font-size: 14px;
      margin-bottom: 20px;
      color: #666;
      text-align: center;
    }

    .btn-register {
      display: block;
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      font-weight: bold;
      background-color: #007bff;
      color: #fff;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-register:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Register as a Company</h5>
            <p class="card-text">Register your company account to access additional features.</p>
            <a href="RegisterCompany.php" class="btn btn-primary btn-register">Register as Company</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Register as a Customer</h5>
            <p class="card-text">Register your customer account to enjoy personalized services.</p>
            <a href="#" class="btn btn-primary btn-register">Register as Customer</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</body>
</html>
