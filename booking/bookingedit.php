
<?php
include("../conn.php");
include("../Bussiness/home.php");

?>
<style>
    body{
        margin-top:5%;
        margin-right: 3%;
        margin-left: 3%;

    }

</style>


<?php

$cid =$_SESSION['company_id'];
$bid=$_GET['bid'];

$sql="select * from booking_view  where bid='$bid' and company_id='$cid'";
$q=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($q);
?>

<div class="container justify-center mt-5">
    <div class="card shadow">
        <div class="card-header bg bg-info  text-center text-white">Booking</div>
        <div class="card-body">

  <div class="alert alert-danger" id="error"> </div>
<div class="alert alert-success" id="success"></div>
            
            <form id="booking_form" method="Post" action="booking_handler.php">
            <input type="hidden" name="pid" id="pid" value="<?php echo $row['pid']?>">   
            <input type="hidden" name="bid" id="bid" value="<?php echo $row['bid']?>">   
            <input type="hidden" name="company_id" id="company_id" value="<?php echo $cid?>">
                <label class="form-label">hall Name</label>
                <select class="form-control form-control-sm select2 text-black" id="hall_id" name="hall_id">
                <option value="<?php echo $row["hall_id"]; ?>"><?php echo $row['hall_type'] ?></option>
                    <?php
                    $_query = mysqli_query($conn, "select * from halls where Company_id='$id' ");
                    if (mysqli_num_rows($_query) > 0) {
                        $_query = mysqli_query($conn, "select * from halls where Company_id='$id'");
                        while ($data = mysqli_fetch_array($_query)) {
                    ?>
               
                            <option value="<?php echo $data["hall_id"]; ?>"><?php echo $data['hall_type'] ?></option>
                        <?php
                        }
                    } else {
                        ?>
                        <option value="">No data Available</option>
                    <?php
                    }
                    ?>
                </select>
                <label class="form-label">customers Name</label>
                <select class="form-control form-control-sm select2 text-black" id="cid" name="cid">
                <option value="<?php echo $row["custid"]; ?>"><?php echo $row['firstname'] ?></option>
                    <?php
                    $_query = mysqli_query($conn, "select * from customers where Company_id='$id' ");
                    if (mysqli_num_rows($_query) > 0) {
                        $_query = mysqli_query($conn, "select * from customers where Company_id='$id'");
                        while ($data = mysqli_fetch_array($_query)) {
                    ?>
               
                            <option value="<?php echo $data["custid"]; ?>"><?php echo $data['firstname'] ?></option>
                        <?php
                        }
                    } else {
                        ?>
                        <option value="">No data Available</option>
                    <?php
                    }
                    ?>
                </select>
    
                <label class="form-label">charge Perhead</label>
                <input type="text" class="form-control form-control-sm" id="charge" name="charge" value="<?php echo $row['charge_perhead']?>">



                <label class="form-label">Attendee No</label>
                <input type="text" name="attendee" id="attendee_no" onchange="total();" class="form-control form-control-sm" value="<?php echo $row['attendee_no']?>">
                <label class="form-label">Amount Due</label>
                <input type="text" name="amountdue" id="amountdue" class="form-control form-control-sm"  value="<?php echo $row['amountdue']?>">
                 
        
                <label class="form-label">Amount Paid </label>
                <input type="text" class="form-control form-control-sm" onchange="Paid();" id="amountpaid" name="amountpaid" value="<?php echo $row['amountpaid']?>"> 
                <label class="form-label">Balance </label>
                <input type="text" class="form-control form-control-sm" id="balance" name="balance" value="<?php echo $row['balance']?>" > 
                


               

        
                <label class="form-label">start date</label>
                <input type="date" class="form-control form-control-sm" id="sdate" name="sdate" value="<?php echo $row['Start_date']?>"> 
                <label class="form-label">end date</label>
                <input type="date" class="form-control form-control-sm" id="end_date" name="end_date" value="<?php echo $row['end_date']?>"> 



                <input type="submit" value="Update" class="btn btn-primary btn-sm mt-2 float-right">
                <a href=" booking.php"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>
               

            </form>

            <script>
    $(document).ready(function() {

        $("#error").css("display", "none");
        $("#success").css("display", "none");

        $('#myTable').DataTable();


    })
    $("#booking_form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "booking_handler.php",
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
                    $("#success").text(res.message);
                } else if (res.status == 404) {
                    $("#success").css("display", "none");
                    $("#error").css("display", "block");
                    $("#error").text(res.message);
                }
            }
        });


    });

    function total() {
    var nAttendee = parseInt(document.getElementById("attendee_no").value);
    var chargeAmount = parseInt(document.getElementById("charge").value);



    var total = nAttendee * chargeAmount;


    document.getElementById("amountdue").value = total;

  }
  function Paid() {
    var due = parseInt(document.getElementById("amountdue").value);
    var paid = parseInt(document.getElementById("amountpaid").value);



    var total = due - paid;


    document.getElementById("balance").value = total;

  }
</script>
</div>
