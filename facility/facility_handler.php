<?php
include("../conn.php");

$name=$_POST["name"];
$price=$_POST["price"];
$hall_id=$_POST["hall_id"];
$facilityid=$_POST['facilityid'];

if($facilityid==null){

    $query=mysqli_query($conn," insert into facility values (null,'$name','$price','$hall_id') ");

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
    
    $sql="update facility set facility_name='$name',Price='$price',hall_id='$hall_id' where facility_id='$facilityid'";
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
