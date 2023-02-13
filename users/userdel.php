
<?php
include("../conn.php");
$id=$_GET['id'];
$userid=$_GET['userid'];
if(isset($_GET['userid'])){
    $userid=$_GET['userid'];

    $query=mysqli_query($conn," delete from users where id='$userid'");



if($query){

    
header("location:users.php?id=$id");
}
else{
    ?>
 
    <a href="users.php?id=<?php echo $id?>"></a>
    
    <?php
}
}