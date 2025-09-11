<?php
$servername = "localhost"; // Serverio adresas
$username = "root"; // MySQL naudotojo vardas
$password = ""; // MySQL slaptažodis
$dbname = "users_db"; // Duomenų bazės pavadinimas

// Sukuriame prisijungimą
$conn = new mysqli($servername, $username, $password, $dbname);

// Tikriname, ar jungtis pavyko
if ($conn->connect_error) {
    die("Prisijungimo klaida: " . $conn->connect_error);
}
?>
