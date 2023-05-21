<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/ticket.class.php');
    require_once(__DIR__ . '/../database/change.class.php');
    require_once(__DIR__ . '/../database/subject.class.php');

    $db = getDatabaseConnection();

    
    if (isset($_POST["ticket"]) && isset($_POST["subject"])) {

        $subject_id= (int)$_POST["subject"];
        $subject = Subject::getSubject($db, $subject_id);

        Change::createChange($db, (int) $_POST["ticket"], "subject", $subject->full_name);

        Ticket::changeTicketSubject($db, (int) $_POST["ticket"], (int) $_POST["subject"]);
        exit();
    }
?>