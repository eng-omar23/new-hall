
<?php
include("../conn.php");
$id=$_GET['id'];
if(isset($_GET['hid'])){
    $hallid=$_GET['hid'];

$query=mysqli_query($conn," delete from halls where hall_id='$hallid'");

if($query){

    
header("location:hview.php?id=$id");
}
else{
    ?>
 
    <a href="hview.php??id=$id"></a>
    
    <?php
}
}