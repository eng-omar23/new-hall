<?php

include("conn.php");

if(isset($_POST["submit"])){


$email=$_POST["email"];
$pass=$_POST["password"];

$sql="select * from users where email='$email' ";
$check_email=mysqli_query($conn,$sql);

if(mysqli_num_rows($check_email)){
     
$query=mysqli_query($conn,"select * from users where email='$email' and password='$pass'");
$data=mysqli_fetch_assoc($query);
$type=$data['type'];
$id=$data=['id'];
if($query){
    if($type="business"){
        header("location:Admin/js/index.php?id='$id'");
    }
    else if($type=='Admin'){
   header("location:navbar.php");
    }


}
else{
    echo "wrong user or pass ";
}
}
else{
    exit("this email does not exist ".$email);
}

}


?>