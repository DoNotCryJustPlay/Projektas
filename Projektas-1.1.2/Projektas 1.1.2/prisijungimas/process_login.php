<?php
session_start();
require 'db_connect.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Visi laukai turi būti užpildyti.";
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];  // Galite pridėti ir el. paštą į sesiją
        // Po sėkmingo prisijungimo nukreipti į kitą puslapį
        header("Location: ../index.php");  // Pakeiskite 'index.php' į norimą puslapį
        exit();
    } else {
        $_SESSION['error'] = "Neteisingas slaptažodis.";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Vartotojas su tokiu el. paštu nerastas.";
    header("Location: login.php");
    exit();
}

$stmt->close();
$conn->close();
?>
