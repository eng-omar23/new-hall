<?php
require '../conn.php';
$hallid=$_POST['hallid'];
$company_id=$_POST['company_id'];
$type=$_POST['type'];
$desc=$_POST['desc'];
$capacity=$_POST['capacity'];
$location=$_POST["location"];
$charge=$_POST['charge_perhead'];
$photo=$_FILES['photo']['name'];
$path=$_FILES['photo']['tmp_name'];
$mdate=$_POST['mdate'];
$folder ="../image/".$photo;


if($hallid==null){   
$sql="insert into halls values (null,'$company_id','$type','$location','$capacity','$charge','$folder','$desc','$mdate')";
$query=mysqli_query($conn,$sql);

if($query){
    move_uploaded_file($path,$folder);
    $result = [
        'message'=>'successfully inserted a new row',
         'status'=>200
        ];
    echo json_encode($result);
    return ;
}
else{

    $result = [
    'message'=>'Could Not Create new Hall', 
    'status'=>404
];
    echo json_encode($result);
    return ;
}
}

else{   

 $sql="update halls set company_id='$company_id',hall_type='$type',location='$location',capacity='$capacity',
 charge_perhead='$charge',hall_photo='$folder',hall_desc='$desc',date='$mdate' where hall_id='$hallid' ";
    $query=mysqli_query($conn,$sql);
    
    if($query){
        move_uploaded_file($path,$folder);
        $result = [
            'message'=>'successfully Updated a new row',
             'status'=>200
            ];
        echo json_encode($result);
        return ;
    }
    else{
    
        $result = [
        'message'=>'Could Not Updated', 
        'status'=>404
    ];
        echo json_encode($result);
        return ;
    }
    }




?>