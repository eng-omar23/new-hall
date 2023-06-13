<?php
include_once("../conn.php");
include_once("../functions.php");
$name = sanitizeInput($_POST['username']);
$email = sanitizeInput($_POST['email']);
$pass = sanitizeInput($_POST['password']);
$status=sanitizeInput($_POST['status']);
$type = sanitizeInput($_POST['type']);
$userid =sanitizeInput($_POST['userid']);
$date = date('y,m,d');

$data = array(
    'user_id' => null,
    'username' => $name,
    'password' => $pass,
    'email' => $email,
    'type' => $type,
    'status' => $status,
    'date' => $date
);
if($userid==null){
    $sql="select * from users where email='$email'";
   $check=check($conn,$sql);
    if($check){
        $result = [
            'message'=>'Failed',
             'status'=>404
            ];
        echo json_encode($result);
        return ;
    }
    elseif($name =="" || $name == null){
        $result = [
            'message'=>'All fields are required',
             'status'=>200
            ];
        echo json_encode($result);
        return ;
    }
    else{
        $success= InsertUsersData($conn,$data);
if($success){

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
 



}

else{

    $sql = "UPDATE users SET username='$name', email='$email', password='$pass', type='$type', status='$status' WHERE user_id='$userid'";
    $q = mysqli_query($conn, $sql);
    
    if ($q) {
        $result = [
            'message' => 'Successfully updated user',
            'status' => 200
        ];
    } else {
        $result = [
            'message' => 'Failed to update user',
            'status' => 400
        ];
    }
    
    echo json_encode($result);
    return;
    
    
      

}




