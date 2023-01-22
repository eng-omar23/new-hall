
<?php
include("../conn.php");
$id=$_GET['id'];
if(isset($_GET['fid'])){
    $facid=$_GET['fid'];

$query=mysqli_query($conn," delete from facility where facility_id='$facid'");

if($query){

    
header("location:facilityview.php?id=$id");
}
else{
    ?>
 
    <a href="facilityview.php?id=<?php echo $id?>"></a>
    
    <?php
}
}