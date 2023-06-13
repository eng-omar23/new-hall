
<?php
include("../conn.php");

$userid=$_GET['userid'];

if(isset($_GET['userid'])){
    $userid=$_GET['userid'];
$sql="delete from users where user_id='$userid' ";
    $query=mysqli_query($conn,$sql);
if($query){
header("location:users.php");
}
else{
    header("location:users.php");
}
}