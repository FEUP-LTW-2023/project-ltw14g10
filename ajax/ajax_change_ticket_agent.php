<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/ticket.class.php');
    require_once(__DIR__ . '/../database/change.class.php');
    require_once(__DIR__ . '/../database/user.class.php');
    require_once(__DIR__ . '/../database/user.class.php');

    $db = getDatabaseConnection();

    if (isset($_POST["ticket"]) && isset($_POST["agent"])) {

        $agent_id= (int)$_POST["agent"];
        $agent = User::getUser($db, $agent_id);
        
        Change::createChange($db, (int) $_POST["ticket"], "agent", $agent->name);

        $ticket = Ticket::getTicket($db, (int) $_POST["ticket"]);
        if($ticket->status == 2)
             Change::createChange($db, (int) $_POST["ticket"], "status", "Open");

        Ticket::changeTicketAgent($db, (int) $_POST["ticket"], (int) $_POST["agent"]);
        exit();
    }
?>