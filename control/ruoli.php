<?php
session_start();
include 'conn.php';

// Ottieni lo username dalla sessione
$username = $_SESSION['username'];

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Prepara ed esegui una query per ottenere il ruolo dell'utente
$sql = "SELECT role FROM users WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Controlla se è stato trovato un record corrispondente
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $role = $row['role'];

    // Controlla il ruolo dell'utente e reindirizza di conseguenza
    if ($role == 'user') {
        header('Location: ../view/feedUser.php');
    } elseif ($role == 'developer' || $role == 'engineer') {
        header('Location: ../view/feedDev.php');
    } else {
        echo "Ruolo non riconosciuto.";
    }
} else {
    // Se lo username non è trovato nel database
    echo "Username non trovato nel database.";
}

// Chiudi la connessione al database
$stmt->close();
$conn->close();
?>
