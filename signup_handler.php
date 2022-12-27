<?php
include("conn.php");


$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cname = $_POST['cname'];
$status="inActive";
$confirmpassword = @$_POST['confirmpassword'];
$type = 'business';


if (isset($_POST['btnSignup'])) {

//get company id from given name
$sql="select * from company_reg where Name='$cname'";
 $company_id=mysqli_query($conn,$sql);

   $data=mysqli_fetch_array($company_id);
   $id=$data['id'];     
//check if the users exits
   $check_users=mysqli_query($conn,"select * from users where email='$email'");
   if(mysqli_num_rows($check_users)==0){
    //insert into users if user does not exist
$sql = "insert into users values (null,'$id' '$name','$pass','$email','$type',null,'$status')";
$query = mysqli_query($conn, $sql);
if ($query) {
?>
    <script>
        alert("successfully created an account");
        window.location = "login.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Failed To created an account");
    </script>
<?php
}
   }
   else{
    ?>
    <script>
        alert("user ALready exists");
    </script>
<?php
   }
       
    }

?>
