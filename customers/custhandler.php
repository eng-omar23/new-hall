<?php
include("../conn.php");

$name=$_POST["Name"];
$cid=$_POST["cid"];
$Phone=$_POST["Phone"];
$company_id=$_POST["company_id"];
$Email=$_POST['Email'];

if($cid==null){

    $query=mysqli_query($conn,"insert into customers values (null,'$name','$Phone','$Email','$company_id')");

    if($query){
        $Result=[
            'message' => "successfully inserted new record", 
            'status'=> 200
        ];
        echo json_encode($Result);
    }
    else{
        $Result=[
            'message' => "Faled to inserted new record", 
            'status'=> 404
        ];
        echo json_encode($Result);
    }
    
}
else{
    
    $sql="update customers phone set firstname='$name',phone='$Phone',Email='$Email' where custid='$cid'";
    $query=mysqli_query($conn,$sql);
    if($query){
        $Result=[
            'message' => "successfully updated ", 
            'status'=> 200
        ];
        echo json_encode($Result);
    }
    else{
        $Result=[
            'message' => "Failed to update", 
            'status'=> 404
        ];
        echo json_encode($Result);
    }
    
}
