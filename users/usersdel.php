
<?php
include("../conn.php");
$id = $_SESSION['company_id'];
$userid=$_GET['userid'];

if(isset($_GET['userid'])){
    $userid=$_GET['userid'];

    $query=mysqli_query($conn,"delete from users where id='$userid'");
if($query){

header("location:users.php");
}
else{
    header("location:users.php");
}
}