<?php
include("../conn.php");
include("../functions.php");
$name=$_POST["name"];
$price=$_POST["price"];
$facilityid=$_POST['facilityid'];

$data=array(
   'facility_id ' => null,
   'facility_name' => $name,
   'Price' => $price,    
);


if($facilityid==null){

$sql="select * from facility where facility_name ='$name' ";
$check=check($conn,$sql);
    if ($check){
        $Result=[
            'message' => "This Fcility Already Exists", 
            'status'=> 200
        ];
        echo json_encode($Result);
    }

   else{
    $success=facility($conn,$data);
   if($success){
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
    
}
else{
    
    $sql="update facility set facility_name='$name',Price='$price' where facility_id='$facilityid'";
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
