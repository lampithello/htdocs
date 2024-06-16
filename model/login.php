<?php
session_start();
include_once '../control/conn.php';

function querySelect($conn, $email) {
    $stmt = $conn->prepare("SELECT email, password, name FROM users WHERE email = ?");
    if (!$stmt) {
        echo "Errore nella preparazione della query: " . $conn->error;
        return false;
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function confrontoCredenziali($inputPassword, $storedPassword) {
    return password_verify($inputPassword, $storedPassword);
}

function inizioSessione($email, $name) {
    $_SESSION['email'] = $email; 
    $_SESSION['username'] = $name;
    redirectToHome();
}

function redirectToHome() {
    header('Location: ../view/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $logEmail = $_POST['LoginEmail'];
    $logPsw = $_POST['LoginPassword'];

    $user = querySelect($conn, $logEmail);

    if ($user) {
        if (confrontoCredenziali($logPsw, $user['password'])) {
            inizioSessione($logEmail, $user['name']);
        } else {
            redirectToHome();
        }
    } else {
        redirectToHome();
    }
}
