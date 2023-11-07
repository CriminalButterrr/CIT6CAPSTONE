<?php
$conn = new mysqli('localhost', 'harold', 'wisdom.123', 'dentalab_ark');

if ($conn->connect_error) {
    echo 'Error: '. $conn->connect_error;
}
?>