<?php
include_once('nav.php')
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
 
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      border: 1px solid #ced4da;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    }

    .login-title {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ced4da;
    }

    .login-form button[type="submit"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
    }

    .login-form button[type="submit"]:hover {
      background-color: #0056b3;
    }

    .login-form .signup-link {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="login-container">
      <h3 class="login-title">Login</h3>
      <form id="loginForm" Action="login_handler.php" method="Post" class="login-form">
      <div class="alert alert-danger" id="error"> </div>
        <input type="text" id="InputEmail"  name="Email" placeholder="Username">
        <input type="password" id="InputPassword" name="Password" placeholder="Password">
        <button type="submit">Login</button>
      </form>
      <div class="signup-link">
        <p>Don't have an account? <a href="RegisterOption.php">Sign up</a></p>
      </div>
    </div>
  </div>
 
</body>
</html>
<script>

  // Form submission using AJAX
  $('#loginForm').submit(function(e) {
    e.preventDefault(); // Prevent default form submission behavior

    // Validate form inputs
    var email = $('#InputEmail').val();
    var pass = $('#InputPassword').val();
   

    // Perform basic validation
    if (email === '' || pass === '') {
      alert('Please fill in all fields.');
      return;
    }

   

    // Collect form data
    var formData = $(this).serialize();

    // AJAX request
    $.ajax({
      url: 'login_handler.php',
      type: 'POST',
      data: formData,
      success: function(resp) {
              alert(resp)
              var res = jQuery.parseJSON(resp);
              if (res.status == 200) {
                console.log("Success")
                  // $("#success").css("display", "block");
                  // $("#success").text(res.message);
              } else if (res.status == 404) {
               
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
