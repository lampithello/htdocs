<?php
$conn = new mysqli("localhost", "root", "hcKnOWk9VMHT9WSk", "test");
if ($conn->connect_errno) {
    printf("<h1>Connessione al server Mysql fallita: %s</h1>", $conn->connect_error);
    exit();
}

