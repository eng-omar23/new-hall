
<?php

$conn = new mysqli("localhost","root","","hbs (1)");
if($conn->connect_error){
   echo $conn->error;
}else{
    echo "success";
}

?>