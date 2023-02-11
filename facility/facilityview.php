
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

$id = $_GET['id'];
$sql="select * from company_reg where id='$id' ";
$query=mysqli_query($conn,$sql);
$data=mysqli_fetch_array($query);



?>
<div class="container my-3">
    <div class="d-flex justify-content-between m-2">
      <h1 class="text-center"> facility  Form</h1>
      
      <button type="button" id="callModal" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal"><i class="fa-solid fa-user-plus"></i> Add New Facility</button>
      

  <!-- Insert Modal -->
<div class="modal fade" id="completeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="completeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New facility</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     


            <div class="alert alert-danger" id="error"> </div>
            <div class="alert alert-success" id="success"></div>
            <form id="fa_form" method="Post" action="facility_handler.php">

                <input type="hidden" name="facilityid" id="facilityid">
                <select class="form-control form-control-sm select2 text-black" id="hall_id" name="hall_id">

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


                <label class="form-label">Facility Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Enter Facility Name">

                <label class="form-label">Price</label>

                <input type="text" name="price" id="price" class="form-control form-control-sm" placeholder="Enter facility Price ">



                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="facilityview.php?id=<?php echo $id ?>"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>
               

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
                   <h6 class="m-0 font-weight-bold text-dark">Faciltity Details</h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                   <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
    <thead  class="table-dark">

    <tr>
    <td>SNO</td>
        <td>Facility Name</td>
        <td>Price</td>
        <td>hall type</td>

        <td>Maniplate</td>
    </tr>
    </thead>
    <tbody>

   
    <?php
    
     $id =$_GET['id']; 
     $n=1;
   
    $sql="Select f.*,h.* from facility f join halls h on f.hall_id=h.hall_id where company_id='$id'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        $sql="Select f.*,h.* from facility f join halls h on f.hall_id=h.hall_id where company_id='$id'";
        $query=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_array($query)){

   
        ?>
        <tr>
        <td><?php echo $n; ?></td>
        <td><?php echo $data["facility_name"]?></td>
        <td><?php echo $data["Price"]?></td>  
        <td><?php echo $data["hall_type"]?></td> 
    
       
              
        <td>
        <a  href="fedit.php?fid=<?php echo $data["facility_id"]?>&&id=<?php echo $id?>"class="btn btn-warning"><i class="fas fa-edit"></i></a> 
        <a href="facilityDel.php?fid=<?php echo $data["facility_id"]?>&&id=<?php echo $id?>"class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
</div>
               </div>
           </div>






<script>
    $(document).ready(function() {

        $("#error").css("display", "none");
        $("#success").css("display", "none");

        $('#myTable').DataTable();


    })
    $("#fa_form").submit(function(e) {
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
