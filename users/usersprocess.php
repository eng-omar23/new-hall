<?php
include("../conn.php");


$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cname = $_POST['company_id'];
$status=['status'];

$type = $_POST['type'];
$userid =$_POST['userid'];
$bdate = date('y,m,d');
if($userid==""){

$sql="insert into users values(null,'$cname','$name','$pass','$email','$type','$bdate','%status')";
$query=mysqli_query($conn,$sql);

if($query){

    $result = [
        'message'=>'successfully inserted a new row',
         'status'=>200
        ];
    echo json_encode($result);
    return ;

}
else{
    $result = [
        'message'=>'Failed',
         'status'=>404
        ];
    echo json_encode($result);
    return ;
}


}

else{

    

}





