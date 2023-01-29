
<?php
include("../conn.php");
$id=$_GET['id'];
if(isset($_GET['cid'])){
    $cid=$_GET['cid'];

$query=mysqli_query($conn," delete from customers where custid='$cid'");

if($query){

    
header("location:custview.php?id=$id");
}
else{
    ?>
 
    <a href="facilityview.php?id=<?php echo $id?>"></a>
    
    <?php
}
}