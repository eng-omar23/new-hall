
<?php include '../config/conn.php'; 
    
    header("Content-type: application/json");

    function RegisterUsers($conn){
        extract($_POST);
        $data = array();

        $query = "CALL UserOperation('','$UserName','$Password','$Tell','$UserType','$UserStatus')";
        $result = $conn->query($query);
        if($result){
             $data = array("status" => true, "data" => "Registered Successfully!!");
        }else{
            $data = array("status" => false, "data" => $conn->error);
        }

        echo json_encode($data);
    }


    if(isset($_POST['action'])){
        $action = $_POST['action'];
        $action($conn);
    }else{
        echo json_encode(array("status" => false, "data" => "Action is required"));
    }
    
    function GetAllUsers($conn){
        $data = array();
        $msg = array();

        $query = "SELECT `id`, `UserName`, `Password`, `Tell`, `UserType`, `UserStatus` FROM `users` WHERE 1";
        $result = $conn->query($query);
        if($result){
            
            while($row = $result->fetch_assoc())

                $data [] = $row;

            $msg = array("status" => true, "data" => $data);

        }else{

            $msg = array("status" => false, "data" => $conn->erro);
        }
        echo json_encode($msg);
    }

    
    ?>


