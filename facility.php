<?php
include("conn.php");
include("Bussiness/home.php");
include("header.php");
?>
<style>
    body {
        margin-top: 9%;

        background-color: white;
        background: #000;
        color: white;
        text-align: center;
        background-color: white;
    }
</style>

<?php

$id = $_GET['id'];
$sql="select * from company_reg where id='$id' ";
$query=mysqli_query($conn,$sql);
$data=mysqli_fetch_array($query);



?>

<div class="container justify-center">
    <div class="card shadow">
        <div class="card-header bg bg-info text-center">Facility Registration</div>
        <div class="card-body">

            <div class="alert alert-danger" id="error"> </div>
            <div class="alert alert-success" id="success"></div>
            <form id="fall_form" method="Post" action="facility_handler.php">

                <input type="hidden" name="facilityid" id="facilityid">
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


                <label class="form-label">Facility Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Enter Facility Name">

                <label class="form-label">Price</label>

                <input type="text" name="price" id="price" class="form-control form-control-sm" placeholder="Enter facility Price ">



                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="./facility/facilityview.php?id=<?php echo $id ?>"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>



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
            url: "./facility/facility_handler.php",
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