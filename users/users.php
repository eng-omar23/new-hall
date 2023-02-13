


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
            <form id="users" method="Post" action="usersprocess.php">

            <input type="hidden" name="userid" id="usersid">             

            <input type="hidden" name="company_id" id="company_id" value="<?php echo $id?>">
            

                    <label for="username">User Name</label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="username" >

<label class="form-label">password</label>
                <input type="text" class="form-control form-control-sm" id="pass" name="pass">


                <label class="form-label">Email</label>
                <input type="text" name="email" id="email"  class="form-control form-control-sm" placeholder="Enter Numver of attendee">
                <label class="form-label">Amount Due</label>
                <input type="text" name="amountdue" id="amountdue" class="form-control form-control-sm">
                 
        
                <label class="form-label">type</label>
                <input type="text" class="form-control form-control-sm" id="type" name="type"> 

        
                <label class="form-label">Status</label>
                <input type="text" class="form-control form-control-sm" id="status" name="status"> 
             


                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 float-right">
                <a href=" users.php?id=<?php echo $id ?>"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>
               

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
<table class="table table-bordered" id="myTable">
    <thead  class="table-dark" > 

    <tr>
    <td>SNO</td>
    <td>company Name</td>
        <td>Username</td>
        
        <td>Password</td>
        <td>Email</td>
        <td>Type</td>
        <td>status</td>
        <td>date</td>
        <td>Maniplate</td>
 
    </tr>
    </thead>
    <tbody>

   
    <?php
    
     $cid =$_GET['id']; 
     $n=1;
     $sql="SELECT u.* , c.* from users u join company_reg c on u.company_id = c.id where company_id='$cid'";
     $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0){

        $sql="SELECT c.Name as Name, u.* from users u join company_reg c on u.company_id = c.id where company_id='$cid'";
   $query=mysqli_query($conn,$sql);
        $query=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_array($query)){

   
        ?>
        <tr>
        <td><?php echo $n; ?></td>

        <td><?php echo $data['Name']?></td>
        <td><?php echo $data['username']?></td>     
        <td><?php echo $data['password']?></td>
        <td><?php echo $data['email']?></td>    
        <td><?php echo $data['type']?></td>    
        <td><?php echo $data['status']?></td> 
        <td><?php echo $data['date']?></td>   
        
     
   
           
        <td>
        <a  href="usersedit.php?userid=<?php echo $data["id"]?>&&id=<?php echo $cid?>&&id=<?php echo $data['id']?>"class="btn btn-warning"><i class="fas fa-edit"></i></a> ||
        
        <a  onclick="alert('are you sure ')" href="userdel.php?userid=<?php echo $data["id"]?>&&id=<?php echo $cid;?>"class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

        $("#myTable").datatable();

        $("#error").css("display", "none");
        $("#success").css("display", "none");

   


    })
    $("#users").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "usersprocess.php",
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
