
<?php
include("../conn.php");
$id=$_GET['id'];
$pid=$_GET['pid'];
if(isset($_GET['bid'])){
    $bid=$_GET['bid'];

    $query=mysqli_query($conn," delete from booking where bid='$bid'");
    $query=mysqli_query($conn," delete from payment where pid='$pid'");


if($query){

    
header("location:booking.php?id=$id");
}
else{
    ?>
 
    <a href="booking.php?id=<?php echo $id?>"></a>
    
    <?php
}
}