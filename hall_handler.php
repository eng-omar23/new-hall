<?php
include("conn.php");
$hallid=@$_POST['hallid'];
$company_id=$_POST['company_id'];
$type=$_POST['type'];
$capacity=$_POST['capacity'];
$location=$_POST["location"];
$charge=$_POST['charge_perhead'];
$photo=$_FILES['photo']['name'];
$path=$_FILES['photo']['tmp_name'];
$date=$_POST['date'];
$folder ="image/".$photo;

$sql="insert into halls values (null, '$company_id', '$type', '$location', '$capacity', '$charge', '$folder', '$date' ) ";
$query=mysqli_query($conn,$sql);

if($query){
    move_uploaded_file($path,$folder);
    $result = [
        'message'=>'successfully inserted a new row',
         'status'=>200];
    echo json_encode($result);
    return ;
}
else{

    $result = ['message'=>'Could Not Create new Hall', 'status'=>404];
    echo json_encode($result);
    return ;

}


?>