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








<!-- Button to trigger the modal -->
<button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#myModal">
  Add New User
</button>
<div container class="mt-5">

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      
      <!-- Modal Body -->
      <div class="modal-body">
   
      <div class="alert alert-danger" id="error"> </div>
<div class="alert alert-success" id="success"></div>
        <form id="users" action="usersprocess.php" method="Post">
        <input type="hidden" class="form-control" id="userid" name="userid" required>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="type" class="form-label">Type</label>
               <select name="type" class="form-control" id="type" required>
               <option value="">Choose User Type</option>
                <option value="company">company</option>
               <option value="customer">customer</option></select>
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
               <select name="status" class="form-control" id="status">
               <option value="">Choose User Status</option>
                <option value="1">Active</option>
               <option value="0">InActive</option></select>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
            </div>
          </div>
            <!-- Modal Footer -->
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i></button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i></button>
        <a href="" class="btn btn-primary"><i class="fa-solid fa-eye "></i> </a>
        </form>
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
       
                            <td>Username</td>
                            <td>Password</td>
                            <td>Email</td>
                            <td>Type</td>
                            <td>status</td>
                            <td>date</td>
                            <td>Action</td>

                        </tr>
                    </thead>
                    


                        <?php
    
     $n=1;
     $sql="SELECT * from users";
     $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0){
        $sql="SELECT * from users";
   $query=mysqli_query($conn,$sql);
        $query=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_array($query)){

   
        ?>
        <tbody>

       
        
                        <tr>
                            <td><?php echo $n; ?></td>

                            <td><?php echo $data['username']?></td>
                        
                            <td><?php echo $data['password']?></td>
                            <td><?php echo $data['email']?></td>
                            <td><?php echo $data['type']?></td>
                            <td><?php echo $data['status']?></td>
                            <td><?php echo $data['date']?></td>




                            <td>
                            <a 
                                    href="useredit.php?userid=<?php echo $data["user_id"]?>"
                                    class="btn btn-info"><i class="fas fa-edit"></i></a> ||

                                <a onclick='alert("are you sure")'
                                    href="usersdel.php?userid=<?php echo $data["user_id"]?>"
                                    class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
               $(document).ready(function(){
                  

                   $("#error").css("display","none");
                   $("#success").css("display","none");
                   $('#myTable').DataTable();
               })
            $("#users").submit(function(e){   
               e.preventDefault();

               $.ajax({
                
                   url:"usersprocess.php",
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
         