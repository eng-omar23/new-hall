<?php

include("conn.php");

if(isset($_POST["submit"])){


$email=$_POST["email"];
$pass=$_POST["password"];

$sql="select * from users where email='$email' ";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)){
     
$query=mysqli_query($conn,"select email,password from users where email='$email' and password='$pass'");

if($query){
    header("location:nav.php");
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