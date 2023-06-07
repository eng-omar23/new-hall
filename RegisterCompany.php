<?php include('nav.php'); ?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 5%;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>
  <div class="container mt-6">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">Register Company</h5>
            <form id="Reg_com_form" method="post" Action="RegComHandler.php">
              <input type="hidden"  name="company_id">
              <div class="alert alert-danger" id="error"> </div>
            <div class="alert alert-success" id="success"></div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter your email">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword">Address</label>
                  <input type="address" class="form-control" id="inputAddress" name="address" placeholder="Enter your Address">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputConfirmPassword">Phone</label>
                  <input type="phone" class="form-control" id="inputPhone" name="phone" placeholder="Enter your Phone">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter your password">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputConfirmPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm your password">
                </div>
              </div>  
              <div>
              <textarea name="description"  placeholder="description about your company"  class="form-control" id="inputDescription" ></textarea>
              </div>

              </div>
              <button type="submit" class="btn btn-info btn-block">Register</button>
            </form>
            <div class="text-center mt-3">
              <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
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
    $('#Reg_com_form').submit(function(e) {
      e.preventDefault(); // Prevent default form submission behavior

      // Validate form inputs
      var name = $('#inputName').val();
      var email = $('#inputEmail').val();
      var address = $('#inputAddress').val();
      var phone = $('#inputPhone').val();
      var password = $('#inputPassword').val();
      var confirmPassword = $('#inputConfirmPassword').val();
      var description = $('#inputDescription').val();

      // Perform basic validation
      if (name === '' || email === '' || address === '' || phone === '' || password === '' || confirmPassword === '' || description  ==='') {
        alert('Please fill in all fields.');
        return;
      }

      if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return;
      }

      // Collect form data
      var formData = $(this).serialize();

      // AJAX request
      $.ajax({
        url: 'RegComHandler.php',
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
