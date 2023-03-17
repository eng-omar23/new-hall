<?php
include('conn.php');
if(isset($_POST['key'])){
  $key = $_POST['key'];
    $sql ="select * from halls where  hall_id='$key' or hall_type='$key' or location='$key'";

    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) > 0){
    }

