<?php
include("conn.php");
include("../Bussiness/home.php");
include("header.php");
?>
<style>
    body {
  margin-top: -9%;

        background-color: white;
        background: #000;
        color: white;
        text-align: center;
        background-color: white;
    }
</style>

<?php

$id = $_GET['hid'];
$cid= $_GET['id'];
$sql = "SELECT c.*,h.* FROM halls h join company_reg c on h.Company_id=c.id where hall_id='$id' and company_id='$cid'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

?>

<div class="container justify-center">
    <div class="card shadow">
        <div class="card-header bg bg-info text-center">Facility Registration</div>
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
                
                <label class="form-label">Charge_perhead</label>
                <input type="text"name="charge_perhead" id="charge_perhead" class="form-control" value="<?php echo $row['charge_perhead']?>">
                
                
                
                <label class="form-label" for="photo" >Hall Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" value="<?php echo $row['hall_photo']?>" > 
                <label class="form-label" for="date">Date</label>
               
                <input type="date" id="date" name="mdate" class="form-control"  value="<?php echo $row['date']?>">

                <label class="form-label">Hall Description </label>
      <textarea class="form-control" id="desc" name="desc" value="<?php echo $row['hall_desc']?>" ><?php echo $row['hall_desc']?>
    </textarea>
               
                <input type="submit" value="UPDATE" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="hview.php?id=<?php echo $cid ?>"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>

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