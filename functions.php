<?php
function get_id($conn,$sql){
    $query=mysqli_query($conn,$sql);
    $data=mysqli_fetch_array($query);
    $id=$data['bid']+1;
    return $id;

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
  
?>