<?php
session_start(); 

include '../control/conn.php';

// Recupera lo username dalla sessione e il contenuto della textarea dal POST
$name = $_SESSION['username'];
$feedback = $_POST['textArea'];

// Prepara e vincola
$stmt = $conn->prepare("INSERT INTO feedtable (name, feedback) VALUES (?, ?)");
if (!$stmt) {
    echo "Errore nella preparazione della query: " . $conn->error;
    return false;
}

$stmt->bind_param("ss", $name, $feedback);
if (!$stmt->execute()) {
    echo "Errore nell'esecuzione della query: " . $stmt->error;
    return false;
}

// Reindirizza alla pagina index.php dopo l'inserimento con successo
header("Location: ../view/index.php");
exit();

// Chiudi la dichiarazione e la connessione
$conn->close();
?>
