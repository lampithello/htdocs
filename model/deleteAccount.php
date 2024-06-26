<?php
session_start();
include_once 'control/conn.php';

if (!isset($_POST['email'])) {
    echo 'Accesso non autorizzato!';
    exit();
}

$email = $_POST['email'];



$stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    session_destroy();
    header("Location: ../view/index.php");
} else {
    echo "Errore durante l'eliminazione dell'account";
}
