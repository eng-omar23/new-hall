<?php
include("nav.php");
include("conn.php");
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    margin-top: 9%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;

  }

  .container {
    max-width: 600px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    background-color: #71b7e6;
  }

  .container .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }

  .container .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
  }

  .content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }

  form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }

  form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }

  .user-details .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }

  .user-details .input-box input:focus,
  .user-details .input-box input:valid {
    border-color: #9b59b6;
  }

  form .gender-details .gender-title {
    font-size: 20px;
    font-weight: 500;
  }

  form .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
  }

  form .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  form .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
  }

  #dot-1:checked~.category label .one,
  #dot-2:checked~.category label .two,
  #dot-3:checked~.category label .three {
    background: #9b59b6;
    border-color: #d9d9d9;
  }

  form input[type="radio"] {
    display: none;
  }

  form .button {
    height: 45px;
    margin: 35px 0
  }

  form .button input {
    height: 100%;
    width: 100%;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
  }

  form .button input:hover {
    /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }

  @media(max-width: 584px) {
    .container {
      max-width: 100%;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: 100%;
    }

    form .category {
      width: 100%;
    }

    .content form .user-details {
      max-height: 300px;
      overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
      width: 5px;
    }
  }

  @media(max-width: 459px) {
    .container .content .category {
      flex-direction: column;
    }
  }

  .font {
    font-size: large;
  }
</style>

<body>


  <?php
  $id = $_GET['id'];
  $sql = "select * from halls where hall_id='$id'";
  $query = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($query);


  $q = mysqli_query($conn, "select max(custid) as cid from customers ");
  $rows = mysqli_fetch_array($q);
  $cid = $rows['cid'] + 1;

  ?>
  <div class="container">
    <div class="title">Booking</div>
    <div class="content">
      <div class="alert alert-danger text-white" id="error"> </div>
      <div class="alert alert-success" id="success"></div>
      <form action="bookingHandler.php" method="post" id="bookingForm">
        <div class="user-details">


          <input type="hidden" id="cid" name="cid" value="<?php echo $cid ?>" required>


          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" id="name" name="name" placeholder="Enter your Name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" id="email" name="email" placeholder="Enter your Email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" id="phone" name="phone" placeholder="Enter your Phone" required>
          </div>
          <div class="input-box">
            <span class="details">ADDRESS</span>
            <input type="text" id="ADDRESS" name="ADDRESS" placeholder="Enter your ADDRESS" required>
          </div>
          <div class="input-box">
            <span class="details">Attendee Number</span>
            <input type="text" id="attendee" name="attendee" onchange="total()" placeholder="Enter Attendee Number" required>
          </div>
          <div class="input-box">
            <span class="details">Hall type</span>
            <input type="text" id="type" name="type" value="<?php echo $data['hall_type'] ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Amountdue</span>
            <input type="text" id="due" name="due" value="<?php echo $data['charge_perhead'] ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Paid</span>
            <input type="text" id="paid" name="paid" placeholder="Amount Paid" required>
          </div>
          <div class="input-box">
            <span class="details">Startdate </span>
            <input type="date" id="date1" name="date1" required>

          </div>
          <div class="input-box">
            <span class="details">EndDate </span>
            <input type="date" id="date2" name="date2" required>
          </div>
          <div>
            <h3 class="title text-center">Choose Additional Services</h3>



            <div>
              <?php
              $sql = "SELECT * FROM facility  ";
              $query = mysqli_query($conn, $sql);
              if (mysqli_num_rows($query) > 0) {
                $sql = "SELECT * FROM facility";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($query)) {
              ?>
                  <span class="details font"><?php echo $data['facility_name'] ?></span>
                  <input type="checkbox" id="facility_name" name="" required>
              <?php
                }
              } else {
                echo "No data available";
              }
              ?>


            </div>
          </div>

        </div>
    </div>
    <div class="button">
      <input type="submit" class="btn btn-info" id="btn" name="save" value="Submit">
    </div>
    </form>
  </div>
  </div>




</body>

<script>
  $(document).ready(function() {

    $("#error").css("display", "none");
    $("#success").css("display", "none");
  })
  $("#bookingForm").submit(function(e) {



    e.preventDefault();

    $.ajax({
      url: "bookingHandler.php",
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(resp) {
        alert(resp)

        var res = jQuery.parseJSON(resp);
        if (res.status == 200) {
          $("#success").css("display", "block");
          $("#error").css("display", "none");
          $("#success").text(res.message);
        } else if (res.status == 404) {
          $("#success").css("display", "none");
          $("#error").css("display", "block");
          $("#success").text(res.message);
        }
      }
    });


  });


  function total() {
    var nAttendee = parseInt(document.getElementById("attendee").value);
    var chargeAmount = parseInt(document.getElementById("due").value);



    var total = nAttendee * chargeAmount;


    document.getElementById("due").value = total;

  }
</script>
</div>