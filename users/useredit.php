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
$userid = $_GET['userid'];
$sql = "select * from users where company_id='$id' and id='$userid' ";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);

?>

<div class="container justify-center">
    <div class="card shadow">
        <div class="card-header bg bg-info text-center text-white ">Users Update </div>
        <div class="card-body">
            <div class="alert alert-danger" id="error"> </div>
            <div class="alert alert-success" id="success"></div>
            <form id="users" method="Post" action="usersprocess.php">

                <input type="hidden" name="userid" id="usersid" value="<?php echo $data['id'] ?>">

                <input type="hidden" name="company_id" id="company_id" value="<?php echo $id ?>">


                <label for="username">User Name</label>
                <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?php echo $data['username'] ?>">

                <label for="pass">password</label>
                <input type="password" name="pass" id="pass" class="form form-control" value="<?php echo $data['password'] ?>">
                <label class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-sm" value="<?php echo $data['email'] ?>">



                <label class="form-label">type</label>
                <select class="form-control form-control-sm" id="type" name="type" value="<?php echo $data['type'] ?>">
                    <option value="<?php echo $data['type'] ?>"><?php echo $data['type'] ?></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>


                <label class="form-label">Status</label>
                <input type="text" class="form-control form-control-sm" id="status" name="status" value="<?php echo $data['status'] ?>">



                <input type="submit" value="update" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="users.php" class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>


            </form>
        </div>


        <script>
            $(document).ready(function() {


                $("#error").css("display", "none");
                $("#success").css("display", "none");

                $("#myTable").datatable();



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