<?php
include("conn.php");

$name=$_POST["name"];
$price=$_POST["price"];
$facilityid=$_POST['facilityid'];
if($facilityid==null){

    $query=mysqli_query($conn,"insert into facility values (null,'$name','$price')
    ");

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
?>