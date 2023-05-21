<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/ticket.class.php');
    require_once(__DIR__ . '/../database/change.class.php');
    require_once(__DIR__ . '/../database/status.class.php');

    $db = getDatabaseConnection();

    if (isset($_POST["ticket"]) && isset($_POST["status"])) {

        $status_id= (int)$_POST["status"];
        $status = Status::getStatus($db, $status_id);
        

        Change::createChange($db, (int) $_POST["ticket"], "status", $status->status_text);


        Ticket::changeTicketStatus($db, (int) $_POST["ticket"], (int) $_POST["status"]);
        exit();
    }
?>