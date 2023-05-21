<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/ticket.class.php');

    $db = getDatabaseConnection();

    if (isset($_POST["ticket"]) && isset($_POST["status"])) {
        Ticket::changeTicketStatus($db, (int) $_POST["ticket"], (int) $_POST["status"]);
        exit();
    }
?>