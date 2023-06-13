<?php
include_once("../conn.php");
include_once("../functions.php");

$customer_id = sanitizeInput($_POST['customer_id']);
$firstname = sanitizeInput($_POST['firstname']);
$email = sanitizeInput($_POST['email']);
$phone = sanitizeInput($_POST['phone']);
$company = sanitizeInput($_POST['company']);
$password = sanitizeInput($_POST['password']);
$currentDate = date('Y-m-d');
$data = array(
    'custid' => null,
    'firstname' => $firstname,
    'phone' => $phone,
    'email' => $email,
);

$users_info= array(
    'user_id' => null,
    'username' => $firstname,
    'password' => $password,
    'email' => $email,
    'type' => "customer",
    'date' => $currentDate,
);

if (empty($customer_id)) {
    $sql = "SELECT * FROM customers WHERE email = '$email'";
    $check = check($conn, $sql);
    if ($check) {
        $result = array(
            'message' => 'Account already exists.',
            'status' => 400
        );
    } else {
        $success = customers_data($conn, $data);
        $users_data=InsertUsersData($conn,$users_info);
        if ($success || $users_data) {
            $result = array(
                'message' => 'Successfully created account. Welcome!',
                'status' => 200
            );
        } else {
            $result = array(
                'message' => 'Failed to Register Customer',
                'status' => 200
            );
        }
    }
} else {
    $result = array(
        'message' => 'You have already registered.',
        'status' => 400
    );
}

// Convert the result to JSON format
echo json_encode($result);
?>
