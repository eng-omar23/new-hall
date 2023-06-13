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


$userid = $_GET['userid'];
$sql = "select * from users where user_id='$userid' ";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">User Details</h6>
        </div>
        <div class="card-body">
            <div class="alert alert-danger" id="error"></div>
            <div class="alert alert-success" id="success"></div>
            <form id="User_edit" action="usersprocess.php" method="Post" >
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
              <input type="hidden" name="userid" id="userid" value="<?php echo $data['user_id']?>">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="<?php echo $data['type']?>" required>
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $data['status'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" id="date" name="date" value="<?php echo $data['date'] ?>" required>
              </div>
            </div>
            <input type="submit" value="Update" class="btn btn-primary btn-sm mt-2 float-right">
            <a href="users.php" class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>
          </div>
        </form>
        </div>
    </div>
</div>


        <script>
            $(document).ready(function() {


                $("#error").css("display", "none");
                $("#success").css("display", "none");

                $("#myTable").datatable();



            })
            $("#User_edit").submit(function(e) {
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