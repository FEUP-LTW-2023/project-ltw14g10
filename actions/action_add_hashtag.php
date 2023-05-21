<?php
    require_once(__DIR__ . '/../database/admin.class.php');
    require_once(__DIR__ . '/../database/hashtag.class.php');
    require_once(__DIR__ . '/../database/connection.db.php');

    $db = getDatabaseConnection();

    if (isset($_POST["ticket_id"]) && isset($_POST["hashtag"])) {
        Hashtag::associateTicket($db, (int)$_POST["ticket_id"], (int)$_POST["hashtag"]);
        header('Location: /../pages/ticket-info.php');
    }
?>