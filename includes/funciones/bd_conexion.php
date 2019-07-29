<?php
$conn = new mysqli('localhost', 'root', 'root', 'vivetraveltours');

if($conn->connect_error) {
    echo $error -> $conn->connect_error;
}
?>