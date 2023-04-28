
<?php
include("../conn.php");

$id=$_SESSION['company_id'];
$pid=$_GET['pid'];
if(isset($_GET['bid'])){
    $bid=$_GET['bid'];

    $query=mysqli_query($conn," delete from booking where bid='$bid'");

    

if($query){
        
 $query=mysqli_query($conn," delete from payment where pid='$pid'");
header("location:booking.php");
}
else{
    ?>
 
    <a href="booking.php"></a>
    
    <?php
}
}