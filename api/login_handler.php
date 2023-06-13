<?php
session_start();
include("../conn.php");
include("../functions.php");

$email = sanitizeInput($_POST['Email']);
$password = sanitizeInput($_POST['Password']);



if (isset($email) && isset($password)) {
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $sql = "SELECT * FROM company_reg WHERE email='$email'";
        $company_id = get_company($conn, $sql);
        if ($company_id != 0) {
            $_SESSION['company_id'] = $company_id;
            header("Location: ../Bussiness/home.php");
            exit;
        } else {
            $sql = "SELECT * FROM customers WHERE email='$email'";
            $cust_id = get_customer($conn, $sql);
            if ($cust_id != 0) {
                $_SESSION['cust_id'] = $cust_id;
                header("Location: ../customerDashboard/index.php");
                exit;
            } else {
                header("Location:../login.php");
                exit;
            }
        }
    } else {
        header("Location:../login.php");
    
    }
}

// Output the JSON response if needed
echo json_encode($result);
return ;


?>