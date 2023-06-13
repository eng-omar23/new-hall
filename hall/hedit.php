<?php
include@("../conn.php");
include@("../Bussiness/home.php");

?>
<style>

        body {
            margin-top: 5%;
            margin-right: 3%;
            margin-left: 3%;
        }
  
</style>

<?php

$id = $_GET['hid'];
$sql = "select * from halls where hall_id ='$id'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Hall Details</h6>
        </div>
        <div class="card-body">
           
  <div class="alert alert-danger" id="error"> </div>
<div class="alert alert-success" id="success"></div>
            <form id="hall_form" method="Post" action="hall_handler.php" enctype="multipart/form-data">
                
                <input type="hidden"name="hallid" id="hallid" value="<?php echo $row['hall_id']?>">

  <input type="hidden" class="form-control"  id="company_id" name="company_id" value="<?php echo $cid?>">

  <label class="form-label" for="type">Hall Type</label>
                <input type="text"name="type" id="type" class="form-control" value="<?php echo $row['hall_type']?>" >
               
                <label class="form-label">Location</label>

                <input type="text"name="location" id="location" class="form-control"  value="<?php echo $row['location']?>">

                
                <label class="form-label">Capacity</label>
                <input type="text"name="capacity" id="capacity" class="form-control" value="<?php echo $row['capacity']?>">
            
                
                
                <label class="form-label" for="photo" >Hall Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" value="<?php echo $row['hall_photo']?>" > 
                <label class="form-label" for="date">Date</label>
               
                <input type="date" id="date" name="mdate" class="form-control"  value="<?php echo $row['date']?>">

                <label class="form-label">Hall Description </label>
      <textarea class="form-control" id="desc" name="desc" value="<?php echo $row['hall_desc']?>" ><?php echo $row['hall_desc']?>
    </textarea>
               
                <input type="submit" value="UPDATE" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="hview.php"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>

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
    $("#hall_form").submit(function(e) {



        e.preventDefault();

        $.ajax({
            url: "hall_handler.php",
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