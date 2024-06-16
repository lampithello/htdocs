<?php

include_once '../control/conn.php';

function passwordCriptata($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

function queryInsert($conn, $name, $surname, $gender, $email, $password, $role) {
    $result = false;  // Variabile per tenere traccia del risultato
    $sql = "INSERT INTO users (name, surname, gender, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        echo "Errore nella preparazione della query: " . $conn->error;
    } else {
        $stmt->bind_param("ssssss", $name, $surname, $gender, $email, $password, $role);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $result = true;
            } else {
                echo "Error: unable to insert data";
            }
        } else {
            echo "Errore nell'esecuzione della query: " . $stmt->error;
        }
    }
    
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = passwordCriptata($_POST['password']); // Hash della password
    $role = $_POST['role'];

    if (queryInsert($conn, $name, $surname, $gender, $email, $password, $role)) {
        echo "Registration successful";
        header("Location: ../view/index.php");
        exit();
    }
}

$conn->close();

