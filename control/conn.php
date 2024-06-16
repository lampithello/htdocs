<?php
$config = require 'config.php';

$servername = $config['servername'];
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno) {
    printf("<h1>Connessione al server Mysql fallita: %s</h1>", $conn->connect_error);
    exit();
}
?>
