<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/ticket.class.php');

    $db = getDatabaseConnection();

    if (isset($_GET["subject"])) {
        $data = Ticket::getTicketsBySubjectRaw($db, (int) $_GET["subject"]);
        header("Content-Type: application/json");
        echo json_encode($data);
        exit();
    }
?>