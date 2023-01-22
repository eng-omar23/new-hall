<?php
include('../conn.php');
$cid = $_POST['cid'];
$cname = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$address = $_POST['Address'];
$desc = $_POST['desc'];
$filename = $_FILES["Logo"]["name"];
$tempname = $_FILES["Logo"]["tmp_name"];
$folder = "../image/" . $filename;
if ($cid == null) {

    if (empty($cname) || empty($email) || empty($phone) || empty($address)) {
        $result = [
            'message' => 'ALl Fields are requred',
            'status' => 404
        ];
        echo json_encode($result);
        return;
    }
    if (file_exists($folder)) {
        exit("file already exits" . $folder);
        $result = [
            'message' => 'file Already exists',
            'status' => 404
        ];
        echo json_encode($result);
        return;
    } 
    else {
        $check = mysqli_query($conn, "select * from company_reg where Name='$name'");
        if (mysqli_num_rows($check) > 0) {
            $result = [
                'message' => 'Company Already exists',
                'status' => 404
            ];
            echo json_encode($result);
            return;
        } else {
            move_uploaded_file($tempname, $folder);
            $sql = "INSERT INTO company_reg  VALUES (null,'$cname','$address','$phone','$email','$folder','$desc')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $result = [
                    'message' => 'successfully inserted a new row',
                    'status' => 200
                ];
                echo json_encode($result);
                return;
            } else {
                $result = [
                    'message' => 'Falure',
                    'status' => 200
                ];
                echo json_encode($result);
                return;
            }
        }
    }
}
