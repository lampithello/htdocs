<?php

function chiusuraSessione()
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../view/index.php"); // Reindirizza l'utente nella homepage dopo il logout
    exit();
}
chiusuraSessione();
