<?php
session_start();
include("conn.php");
include("functions.php");

$email = sanitizeInput($_POST['Email']);
$password = sanitizeInput($_POST['Password']);

function get_company($conn, $sql) {
    $query = mysqli_query($conn, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_array($query);
        return $company_id = $result['id'];
    } else {
        return 0;
    }
}

function get_customer($conn, $sql) {
    $query = mysqli_query($conn, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $result = mysqli_fetch_array($query);
        return $custid = $result['custid'];
    } else {
        return 0;
    }
}

if (isset($email) && isset($password)) {
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    if ($query && mysqli_num_rows($query) > 0) {
        $sql = "SELECT * FROM company_reg WHERE email='$email'";
        $company_id = get_company($conn, $sql);
        if ($company_id != 0) {
            $_SESSION['company_id'] = $company_id;
            header("Location: dashboard/dashboard.php");
            exit;
        } else {
            $sql = "SELECT * FROM customers WHERE email='$email'";
            $cust_id = get_customer($conn, $sql);
            if ($cust_id != 0) {
                $_SESSION['cust_id'] = $cust_id;
                header("Location: customerDashboard/cus_dashboard.php");
                exit;
            } else {
                header("Location: Admin/admin_dashboard.php");
                exit;
            }
        }
    } else {
        $result = array(
            'message' => 'This email  or password is wrong. Please check it.',
            'status' => 400
        );
       
    }
}

// Output the JSON response if needed
echo json_encode($result);
return ;


?>