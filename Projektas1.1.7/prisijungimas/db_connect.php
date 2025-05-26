<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "users_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Prisijungimo klaida: " . $conn->connect_error);
}
?>
