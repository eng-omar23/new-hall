<?php

include('conn.php');
 
// $name = $_POST['name'];
// $email= $_POST['email'];
// $message= $_POST['message'];
// $to = "hallbooking@mail.com";
// $subject = "Mail From website";
// $txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message;
// $headers = "From: noreply@yoursite.com" . "\r\n" .
// "CC: somebodyelse@example.com";
// if($email!=NULL){
//     mail($to,$subject,$txt,$headers);
// }

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$contact_id = $_POST['contact_id'];

if($contact_id== null){

    $sql="insert into messages values('','$name','$message','$phone','$email',null)";

    $q=mysqli_query($conn,$sql);
    if($q){
        $result = [
            'message'=>'Thank you for contacting us ',
             'status'=>200
            ];
        echo json_encode($result);
        return ;
    
    }
    else{
        $result = [
            'message'=>'contact failed',
             'status'=>404
            ];
        echo json_encode($result);
        return ;
    }






}

//header("Location:cards.php");
?>