<?php
include("../conn.php");
include("../Bussiness/home.php");

?>
<style>
    body {
       margin-top: 5%;

        background-color: white;
        background: #000;
        color: black;
      
        background-color: white;
    }
</style>

<?php

$id = $_GET['fid'];

$sql="Select * from facility where facility_id='$id'";
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
            <form id="fall_form" method="Post" action="facility_handler.php">

                <input type="hidden" name="facilityid" id="facilityid" value="<?php echo $row['facility_id']?>">
              <div>
                <label class="form-label">Facility Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" value="<?php echo $row['facility_name']?>">
                </div>
                <div>
                <label class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control form-control-sm" value="<?php echo $row['Price']?>">
              
              </div>
                <input type="submit" value="Update" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="facilityview.php"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>
               
               


            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {

        $("#error").css("display", "none");
        $("#success").css("display", "none");
        $(".select2").select2({
            placeholder: "Please select here ",
            width: "100%",

        })


    })
    $("#fall_form").submit(function(e) {



        e.preventDefault();

        $.ajax({
            url: "facility_handler.php",
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
</div>