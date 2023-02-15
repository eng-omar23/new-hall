
<?php include '../../../conn.php';
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cname = $_POST['company_id'];
$status=$_POST['status'];
$type = $_POST['type'];
$userid =$_POST['userid'];
$bdate = date('y,m,d');
if($userid==""){

$sql="insert into users values(null,'$cname','$name','$pass','$email','$type','$bdate','$status')";
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

    $sql="update users set username='$name', 
    email ='$email', password='$pass', type='$type',
    status='$status' where id='$userid' ";

    $q=mysqli_query($conn,$sql);
 if($q){
    $result = [
        'message'=>'sucessfully update users',
        'status' =>200
    ];
     json_encode($result);
    return ;
 }
 else{
    $result = [
        'message'=>'sucessfully update users',
        'status' =>200
    ];
     json_encode($result);
    return ;
 }
    
      

}





