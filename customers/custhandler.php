<?php
include("../conn.php");
include_once("../functions.php");

$name = $_POST["Name"];
$customer_id = $_POST["cid"];
$phone = $_POST["Phone"];
$email = $_POST['Email'];
$currentDate = date('y-m-d');

// Generate a password with a length of 10 characters
$password_array = generate_password();
$password = $password_array[0]."".$password_array[1];
$data = array(
    'custid' => null,
    'firstname' => $name,
    'phone' => $phone,
    'email' => $email,
);

$users_info = array(
    'user_id' => null,
    'username' => $name,
    'password' => $password,
    'email' => $email,
    'status' => 1,
    'type' => "customer",
    'date' => $currentDate,
);

if (empty($customer_id)) {
    $sql = "SELECT * FROM customers WHERE email = '$email'";
    $checkcustomers = check($conn, $sql);
    if ($checkcustomers) {
        $result = array(
            'message' => 'Account already exists.',
            'status' => 400
        );
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $checkusers = check($conn, $sql);
        if ($checkusers) {
            $result = array(
                'message' => 'Account already exists.',
                'status' => 400
            );
        } else {
            $success = customers_data($conn, $data);
            $users_data = InsertUsersData($conn, $users_info);
            if ($success && $users_data) {
                $result = array(
                    'message' => 'Successfully created Customers.',
                    'status' => 200
                );
            } else {
                $result = array(
                    'message' => 'Failed to register Customer',
                    'status' => 200
                );
            }
        }
    }
} else {
    $sql = "UPDATE customers SET firstname='$name', phone='$phone', Email='$email' WHERE custid='$customer_id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $result = array(
            'message' => "Successfully updated",
            'status' => 200
        );
    } else {
        $result = array(
            'message' => "Failed to update",
            'status' => 404
        );
    }
}

echo json_encode($result);
?>
