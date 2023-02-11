<?php
include("../conn.php");
include("../functions.php");
$company_id=$_POST['company_id'];
$cid = $_POST['cid'];
$due = $_POST['amountdue'];
$paid = $_POST['amountpaid'];
$balance = $_POST['balance'];
$bid = $_POST['bid'];
$pid=$_POST['pid'];
$hall_id = $_POST['hall_id'];
$attendee=$_POST['attendee'];
$status = "Active";
$sdate = $_POST['sdate'];
$edate = $_POST['end_date'];
$bdate = date('y,m,d');


if ($bid=="") {

//get latest booking id and increment so that i can use that id for bid insertion in the payment table
$sql="select max(bid),h.* from booking b join halls h b.hall_id=h.hall_id where h.company_id='$company_id'";

$bid =get_id($conn,$sql);


 
    $sql="insert into booking values(null,'$hall_id','$cid','$status','$attendee','$sdate','$edate','$bdate')";
    $query = mysqli_query($conn,$sql);
    

    
    $payment="insert into payment values(null,'$hall_id','$cid','$due','$paid','$balance','$edate','$bid')";
    $pay_query=mysqli_query($conn,$payment);


    if ($pay_query) {
        $result = [
            'message' => 'successfully Book Hall',
            'status' => 200
        ];
        echo json_encode($result);
        return;
    }
     else {
        $result = [
            'message' => 'Failed To Book a Hall',
            'status' => 404
        ];
        echo json_encode($result);
        return;
    }
}
else{


    $payment="update payment set hall_id='$hall_id',cust_id='$cid',amountdue='$due',
    amountpaid='$paid',balance='$balance' where pid='$pid' ";
    $pay_query=mysqli_query($conn,$payment);
    if($pay_query){
    $sql="update booking set hall_id='$hall_id',custid='$cid',Status='$status',attendee_no='$attendee',
    Start_date='sdate',end_date='$edate' where bid='$bid'";
    $query=mysqli_query($conn,$sql);
    if ($query) {
        $result = [
            'message' => 'successfully updated',
            'status' => 200
        ];
        echo json_encode($result);
        return;
    } else {

        $result = [
            'message' => 'Failed',
            'status' => 404
        ];
        echo json_encode($result);
        return;
    }
}
}
