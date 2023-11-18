<?php 
require_once 'config.php';

$inputName = $_POST['inputName'];
$inputNatureofCase = $_POST['inputNatureOfCase'];
$inputPrice = $_POST['inputPrice'];

$sql = "INSERT INTO transactions (name, nature_of_case, price) VALUES ('$inputName', '$inputNatureofCase','$inputPrice')" ;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>

<br>

<a href="transactions.php">Click here to return</a>