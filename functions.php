<?php
function get_id($conn,$sql){
    $query=mysqli_query($conn,$sql);
    $data=mysqli_fetch_array($query);
    $id=$data['bid']+1;
    return $id;

}
//this function checks if the the record exists or not 
function check($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
// Function to sanitize input values
function sanitizeInput($input)
{
    $sanitizedValue = trim($input); // Remove leading/trailing whitespaces
    $sanitizedValue = stripslashes($sanitizedValue); // Remove backslashes
    $sanitizedValue = htmlspecialchars($sanitizedValue); // Convert special characters to HTML entities
    return $sanitizedValue;
}
function InsertCompanyData($conn, $data) {
    $fields = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
  
    $sql = "INSERT INTO company_reg ($fields) VALUES ($values)";
  
    if ($conn->query($sql)) {
      // Insertion successful
      return true;
    } else {
      // Insertion failed
      return false;
    }
  }
 function InsertUsersData($conn,$data){
    $fields = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
  
    $sql = "INSERT INTO users ($fields) VALUES ($values)";
  
    if ($conn->query($sql)) {
      // Insertion successful
      return true;
    } else {
      // Insertion failed
      return false;
    }
 }
 function customers_data($conn,$data){
  $fields = implode(", ", array_keys($data));
  $values = "'" . implode("', '", array_values($data)) . "'";

  $sql = "INSERT INTO customers ($fields) VALUES ($values)";

  if ($conn->query($sql)) {
    // Insertion successful
    return true;
  } else {
    // Insertion failed
    return false;
  }
}
function facility($conn,$data){
  $fields = implode(", ", array_keys($data));
  $values = "'" . implode("', '", array_values($data)) . "'";

  $sql = "INSERT INTO facility ($fields) VALUES ($values)";

  if ($conn->query($sql)) {
    // Insertion successful
    return true;
  } else {
    // Insertion failed
    return false;
  }
}
//get company id 
function get_company($conn, $sql) {
  $query = mysqli_query($conn, $sql);
  if ($query && mysqli_num_rows($query) > 0) {
      $result = mysqli_fetch_array($query);
      return $company_id = $result['id'];
  } else {
      return 0;
  }
}

//get customer id
function get_customer($conn, $sql) {
  $query = mysqli_query($conn, $sql);
  if ($query && mysqli_num_rows($query) > 0) {
      $result = mysqli_fetch_array($query);
      return $custid = $result['custid'];
  } else {
      return 0;
  }
}
function generate_password($length = 12) {
  // Generate a random string of letters and numbers.
  $letters = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
  $password = '';
  for ($i = 0; $i < $length; $i++) {
    $password .= $letters[mt_rand(0, count($letters) - 1)];
  }

  // Generate a random integer between 1 and 100.
  $integer = mt_rand(1, 100);

  // Return the password and the integer.
  return array($password, $integer);
}

$password_array = generate_password();

$password = $password_array[0]."".$password_array[1];





  
?>