<?php
include("../conn.php");
include("../Bussiness/home.php");

?>

    <style>
        body {
            margin-top: 5%;
            margin-right: 3%;
            margin-left: 3%;
        }
    </style>
<?php

$custid = $_GET['cid'];
$sql="Select * from customers where  custid='$custid'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Facility Details</h6>
        </div>
        <div class="card-body">
        <div class="alert alert-danger" id="error"> </div>
        <div class="alert alert-success" id="success"></div>
        <form id="cust_form" method="Post" action="custhandler.php" enctype="multipart/form-data">

            <input type="hidden" name="cid" id="cid" value="<?php echo $row['custid']?>">

            <input type="hidden" class="form-control" id="company_id" name="company_id" value="<?php echo $id?>">

            <label class="form-label">Customers Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="<?php echo $row['firstname']?>">

            <label class="form-label">Phone</label>

            <input type="text" name="Phone" id="Phone" class="form-control" value="<?php echo $row['phone']?>">


            <label class="form-label">Email</label>
            <input type="text" name="Email" id="Email" class="form-control" value="<?php echo $row['email']?>">



            <input type="submit" value="Update" class="btn btn-primary btn-sm mt-2 float-right">
            <a href="custview.php" class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>

        </form>

        <script>

                $(document).ready(function(){
                   

                    $("#error").css("display","none");
                    $("#success").css("display","none");
                    $('#myTable').DataTable();
                })
             $("#cust_form").submit(function(e){   
       
          

                e.preventDefault();

                $.ajax({
                    url:"custhandler.php",
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
            
      
</script>