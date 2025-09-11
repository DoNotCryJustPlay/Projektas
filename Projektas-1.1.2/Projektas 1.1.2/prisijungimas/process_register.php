<?php
session_start();
require 'db_connect.php'; // Prijungiamas duomenų bazės failas

// Gaunami duomenys iš formos
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Patikriname, ar visi laukai užpildyti
if (empty($name) || empty($email) || empty($password)) {
    $_SESSION['error'] = "Visi laukai turi būti užpildyti.";
    header("Location: register.php");
    exit();
}

// Patikriname, ar toks el. paštas jau užregistruotas
$checkSql = "SELECT id FROM users WHERE email = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $_SESSION['error'] = "Vartotojas su tokiu el. paštu jau egzistuoja.";
    header("Location: register.php");
    exit();
}
$checkStmt->close();

// Šifruojame slaptažodį
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Įrašome naują vartotoją į duomenų bazę
$insertSql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("sss", $name, $email, $hashedPassword);

if ($insertStmt->execute()) {
    // Registracija pavyko - automatiškai prisijungiame
    $_SESSION['user'] = $name;
    header("Location: ../index.php"); // Nukreipiame į pagrindinį puslapį
    exit();
} else {
    $_SESSION['error'] = "Registracijos klaida: " . $conn->error;
    header("Location: register.php");
    exit();
}

$insertStmt->close();
$conn->close();
?>
