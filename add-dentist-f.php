<?php 
require_once 'config.php';

$inputName = $_POST['inputName'];
$inputAddress = $_POST['inputAddress'];
$inputContact = $_POST['inputContact'];

$sql = "INSERT INTO dentist_list (name, clinic_address, contact_num) VALUES ('$inputName','$inputAddress','$inputContact')" ;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>

<br>

<a href="dentist-list.php">Click here to return</a>