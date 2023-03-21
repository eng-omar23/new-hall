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
$id=$_SESSION['company_id'];


?>

<div class="container my-3">
    <div class="d-flex justify-content-between m-2">
      <h1 class="text-center"> Customers  Form</h1>
      
      <button type="button" id="callModal" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModal"><i class="fa-solid fa-user-plus"></i> Add New Customers</button>
 <!-- Insert Modal -->
 <div class="modal fade" id="completeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="completeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">New Customers</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

  <div class="alert alert-danger" id="error"> </div>
<div class="alert alert-success" id="success"></div>
            <form id="cust_form" method="Post" action="custhandler.php" enctype="multipart/form-data">
                
                <input type="hidden"name="cid" id="cid">

  <input type="hidden" class="form-control"  id="company_id" name="company_id" value="<?php echo $id?>">

  <label class="form-label">Customers Name</label>
                <input type="text"name="Name" id="Name" class="form-control" placeholder="Enter Name">
               
                <label class="form-label">Phone</label>

                <input type="text"name="Phone" id="Phone" class="form-control" placeholder="Enter  Phone">

                
                <label class="form-label">Email</label>
                <input type="text"name="Email" id="Email" class="form-control" placeholder="Enter Email">
              
            
               
                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="custview.php?"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>

</form>
</div>
</div>
</div>

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
                   <h6 class="m-0 font-weight-bold text-dark">Customers Details</h6>
               </div>
               <div class="card-body">
                   <div class="table-responsive">

<table class="table table-bordered" id="myTable">
    <thead class="table-dark">

        <tr>
            <td>SNO</td>
            <td> Name</td>
            <td>Phone</td>
            <td>Email</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
    </thead>
    <tbody>


        <?php

        $id =$_SESSION['company_id'];
        $n = 1;
        $sql = "SELECT * FROM customers";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $sql = "SELECT * FROM customers where company_id='$id'";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($query)) {

        ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $data["firstname"] ?></td>
                    <td><?php echo $data["phone"] ?></td>
                    <td><?php echo $data["email"] ?></td>
                   <td><a href="custedit.php?cid=<?php echo $data["custid"] ?>" class="btn btn-warning"> <i class="fa fa-edit"></i>
                   </a></td>
                   <td> <a href="custdel.php?cid=<?php echo $data["custid"] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

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