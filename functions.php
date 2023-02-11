<?php
function get_id($conn,$sql){
    $query=mysqli_query($conn,$sql);
    $data=mysqli_fetch_array($query);
    $id=$data['bid']+1;
    return $id;

}

?>