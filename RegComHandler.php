<?php

include_once('functions.php');
include_once('conn.php');

$company_id = $_POST['company_id'];
$name = sanitizeInput($_POST['name']);
$email = sanitizeInput($_POST['email']);
$address = sanitizeInput($_POST['address']);
$phone = sanitizeInput($_POST['phone']);
$password = sanitizeInput($_POST['password']);
$description = sanitizeInput($_POST['description']);

function check($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

// Store the input values in the $data array
$data = array(
    'id' => null,
    'Name' => $name,
    'Address' => $address,
    'phone' => $phone,
    'email' => $email,
    'Description' => $description,
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
        if ($success) {
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
