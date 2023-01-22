<?php
include("conn.php");

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$cid=$_POST['cid'];
$attendee=$_POST['attendee'];
$due=$_POST['due'];
$paid=$_POST['paid'];
$type=$_POST['type'];
$sdate=$_POST['date1'];
$edate=$_POST['date2'];

if($cid!=""){

    $balance=$due-$paid;


    $search_hall_id="select hall_id from halls where hall_type='$type' ";

    $hallid_query=mysqli_query($conn,$search_hall_id);
    $data=mysqli_fetch_assoc($hallid_query);
    $hall_id=$data['hall_id'];


    $check=mysqli_query($conn,"select * from customers where email='$email'");
    if(mysqli_num_rows($check)>!0){
        $result = [
            'message'=>'already exits',
             'status'=>404
            ];
        echo json_encode($result);
        return ;
    }
    else{

    
    $customerinfo="insert into customers values('$cid','$name','$email','$phone')";
    $query=mysqli_query($conn,$customerinfo);

    $booking="insert into booking values(null,'$hall_id','$cid','inctive','$attendee','$sdate','$edate')";

    $q=mysqli_query($conn,$booking);

    $payment="insert into payment values(null,'$hall_id','$cid','$due','$paid','$balance','$edate'";

    $pay_query=mysqli_query($conn,$payment);
    if($payment){

        $result = [
            'message'=>'successfully Book Hall chech your  email for further notice ',
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
}








?>

