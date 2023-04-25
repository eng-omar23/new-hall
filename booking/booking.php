


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
$id = $_SESSION['company_id'];



?>
<div class="container my-3">
    <div class="d-flex justify-content-between m-2">
      <h1 class="text-center"> Booking Form</h1>
      
      <button type="button" id="callModal" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal"><i class="fa-solid fa-user-plus"></i> Add New Record</button>
      

  <!-- Insert Modal -->
<div class="modal fade" id="completeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="completeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger" id="error"> </div>
            <div class="alert alert-success" id="success"></div>
            <form id="booking_form" method="Post" action="booking_handler.php">

            <input type="hidden" name="bid" id="bid">   
            <input type="hidden" name="company_id" id="company_id" value="<?php echo $id?>">
            
                <label class="form-label">customers Name</label>
                <select class="form-control form-control-sm select2 text-black" id="cid" name="cid">

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

                    <label for="hall_id">Hall Name</label>
                </select>
                <select class="form-control form-control-sm select2 text-black" id="hall_id" name="hall_id">

<?php
$_query = mysqli_query($conn, "select * from halls where Company_id='$id'");
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
<label class="form-label">charge Perhead</label>
                <input type="text" class="form-control form-control-sm" id="charge" name="charge" value="<?php echo $data['hall_type'] ?>">


                <label class="form-label">Attendee No</label>
                <input type="text" name="attendee" id="attendee_no" onchange="total();" class="form-control form-control-sm" placeholder="Enter Numver of attendee">
                <label class="form-label">Amount Due</label>
                <input type="text" name="amountdue" id="amountdue" class="form-control form-control-sm">
                 
        
                <label class="form-label">Amount Paid </label>
                <input type="text" class="form-control form-control-sm" onchange="Paid();" id="amountpaid" name="amountpaid"> 
                <label class="form-label">Balance </label>
                <input type="text" class="form-control form-control-sm" id="balance" name="balance"> 
        
                <label class="form-label">start date</label>
                <input type="date" class="form-control form-control-sm" id="sdate" name="sdate"> 
                <label class="form-label">end date</label>
                <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"> 
                


                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 float-right">
                <a href=" booking.php?id=<?php echo $id ?>"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>
               

            </form>
            </div>
    </div>
</div>
      </div>

    </div>
  </div>
</div>
<div class="container-fluid">
           <!-- DataTales Example -->
           <div class="card shadow mb-4">    
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-dark">Booking Details</h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
<table class="table table-bordered" id="DataTable">
    <thead  class="table-dark" id="DataTable"> 

    <tr>
    <td>SNO</td>
        <td>customers</td>
        <td>status</td>
        <td>hall</td>
        <td>AttendeeNo</td>
        <td>charging Amount</td>
        <td>amountdue</td>
        <td>amountPaid</td>
        <td>balance</td>
        <td>from Date</td>
        <td>To Date</td>
        <td>Maniplate</td>
    </tr>
    </thead>
    <tbody>

   
    <?php
    
     $id =$_SESSION['company_id'];
     $n=1;
     $sql="SELECT * from booking_view where company_id='$id'";
     $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0){
        
  $sql="SELECT * from booking_view where company_id='$id'";
   $query=mysqli_query($conn,$sql);
        $query=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_array($query)){

   
        ?>
        <tr>
        <td><?php echo $n; ?></td>

        <td><?php echo $data['firstname']?></td>
        <td><?php echo $data['Status']?></td>     
        <td><?php echo $data['hall_type']?></td>
        <td><?php echo $data['attendee_no']?></td>    
        <td><?php echo $data['charge_perhead']?></td>    
         <td><?php echo $data['amountdue']?></td>
         <td><?php echo $data['amountpaid']?></td>
         <td><?php echo $data['balance']?></td>
         <td><?php echo $data['Start_date']?></td>
        <td><?php echo $data['end_date']?></td>
           
        <td>
        <a  href="bookingedit.php?bid=<?php echo $data["bid"]?>"class="btn btn-warning"><i class="fas fa-edit"></i></a> ||
        <a href="booking_del.php?bid=<?php echo $data["bid"]?>"class="btn btn-danger"><i class="fas fa-trash"></i></a>


        </td>

    </tr>
    <?php
    $n++;

    }
}
    else{
        echo "no data available";
    }
    ?>


</tbody>
</table>

<script>
    
    $(document).ready(function() {

        $("#error").css("display", "none");
        $("#success").css("display", "none");

   


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
