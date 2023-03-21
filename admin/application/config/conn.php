
<?php

$conn = new mysqli("localhost","root","","hbs");
if($conn->connect_error){
   echo $conn->error;
}else{
    echo "success";
}

?>