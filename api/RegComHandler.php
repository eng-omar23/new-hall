<?php

include_once('../functions.php');
include_once('../conn.php');

$company_id = $_POST['company_id'];
$name = sanitizeInput($_POST['name']);
$email = sanitizeInput($_POST['email']);
$address = sanitizeInput($_POST['address']);
$phone = sanitizeInput($_POST['phone']);
$password = sanitizeInput($_POST['password']);
$description = sanitizeInput($_POST['description']);
$currentDate = date('Y-m-d');

// Store the input values in the $data array
$data = array(
    'id' => null,
    'Name' => $name,
    'Address' => $address,
    'phone' => $phone,
    'email' => $email,
    'Description' => $description,
);
$users_info= array(
    'user_id' => null,
    'username' => $name,
    'password' => $password,
    'email' => $email,
    'type' => "Company",
    'date' => $currentDate,
);

if (empty($company_id)) {
    $sql = "SELECT * FROM company_reg WHERE email = '$email'";
    if (check($conn, $sql)) {
        $result = array(
            'message' => 'Account already exists.',
            'status' => 400
        );
    } else {
        $success = InsertCompanyData($conn, $data);
        $users_data=InsertUsersData($conn,$users_info);
        if ($success || $users_data) {
            $result = array(
                'message' => 'Successfully created account. Welcome!',
                'status' => 200
            );
        } else {
            $result = array(
                'message' => 'Error creating account. Please try again.',
                'status' => 500
            );
        }
    }
} else {
    $result = array(
        'message' => 'Company already exists.',
        'status' => 400
    );
}

// Return the JSON response
echo json_encode($result);
?>
