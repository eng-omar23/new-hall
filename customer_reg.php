<?php
include_once("nav.php");
include_once("conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Form</title>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 40px 20px;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-label {
      font-size: 14px;
      font-weight: bold;
    }
    .form-control {
      font-size: 14px;
    }
  
    .btn-info{
      width: 80%;
      padding: 10px;
      border-radius: 5px;
      border: 10%;
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
    }

    .login-form button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h3 class="mb-4 text-center">Customer Registeration</h1>
        <form id="CustomersForm" action="./api/customer_handler.php" method="POST">
        <input type="hidden"  name="customer_id">
              <div class="alert alert-danger" id="error"> </div>
            <div class="alert alert-success" id="success"></div>
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control form-control-sm" id="firstname" name="firstname" required >
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="Phone" class="form-control form-control-sm" id="phone" name="phone" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
          </div>
          <div class="mb-3">
          
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter your password">
                </div>


         
          <div class="text-center">
          <button type="submit" class="btn btn-info form-button btn-sm ">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
</body>
</html>

</html>
<script>

$(document).ready(function() {
    $("#error").css("display", "none");
$("#success").css("display", "none");
$(".select2").select2({
    placeholder: "Please select here ",
    width: "100%",

})
    // Form submission using AJAX
    $('#CustomersForm').submit(function(e) {
      e.preventDefault(); // Prevent default form submission behavior

      var firstname = $('#firstname').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var company = $('#company').val();


      // Collect form data
      var formData = $(this).serialize();

      // AJAX request
      $.ajax({
        url: './api/customer_handler.php',
        type: 'POST',
        data: formData,
        success: function(resp) {
                alert(resp)

                var res = jQuery.parseJSON(resp);
                if (res.status == 200) {
                    $("#success").css("display", "block");
                    $("#success").text(res.message);
                } else if (res.status == 404) {
                    $("#success").css("display", "none");
                    $("#error").css("display", "block");
                    $("#error").text(res.message);
                }
            },
        error: function(xhr, status, error) {
          // Handle error response from the server
          alert('Error: ' + error);
        }
      });
    });
  });
</script>
