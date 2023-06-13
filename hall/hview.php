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
$id = $_SESSION['company_id'];


?>

<div class="container my-3">
  <div class="d-flex justify-content-between m-2">
    <h1 class="text-center">Hall Form</h1>
    
    <button type="button" id="callModal" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal">
      <i class="fa-solid fa-user-plus"></i> Add New Hall
    </button>
  </div>

  <!-- Insert Modal -->
  <div class="modal fade" id="completeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="completeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">New Hall</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-danger" id="error"></div>
              <div class="alert alert-success" id="success"></div>
              <form id="hall_form" method="Post" action="hall_handler.php" enctype="multipart/form-data">
                <input type="hidden" name="hallid" id="hallid">
                <input type="hidden" class="form-control" id="company_id" name="company_id" value="<?php echo $id?>">

                <div class="mb-3">
                  <label class="form-label">Hall Type</label>
                  <input type="text" name="type" id="type" class="form-control" placeholder="Enter Hall Type">
                </div>

                <div class="mb-3">
                  <label class="form-label">Location</label>
                  <input type="text" name="location" id="location" class="form-control" placeholder="Enter Hall Location">
                </div>

                <div class="mb-3">
                  <label class="form-label">Capacity</label>
                  <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Enter Hall Capacity">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Hall Photo</label>
                  <input type="file" name="photo" id="photo" class="form-control">
                </div>

                <div class="mb-3">
                  <label class="form-label">Hall Description</label>
                  <textarea class="form-control" name="desc" id="desc"></textarea>
                </div>
                <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i></button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i></button>
        <a href="" class="btn btn-primary"><i class="fa-solid fa-eye "></i> </a>
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">User Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-dark table-bordered table-hover">
                    <thead class="table-dark">

        <tr>
            <td>SNO</td>
            <td>Type</td>
            <td>location</td>
            <td>capacity</td>
            <td>Date</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>


        <?php

        $n = 1;
        $sql = "select * from halls";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $sql = "select * from halls";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($query)) {

        ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $data["hall_type"] ?></td>
                    <td><?php echo $data["location"] ?></td>
                    <td><?php echo $data["capacity"] ?></td>
                    <td><?php echo $data["date"] ?></td>
             <td> <a href="hedit.php?hid=<?php echo $data["hall_id"] ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a href="hall_del.php?hid=<?php echo $data["hall_id"] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
              <a href="hall_del.php?hid=<?php echo $data["hall_id"] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
            </td>

                </tr>
        <?php
                $n++;
            }
        } else {
            echo "no data available";
        }
        ?>

    </tbody>
</table>
<script>
 

    

                $(document).ready(function(){
                   

                    $("#error").css("display","none");
                    $("#success").css("display","none");
                    $('#myTable').DataTable();
                })
             $("#hall_form").submit(function(e){   
       
          
                e.preventDefault();

                $.ajax({
                    url:"hall_handler.php",
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