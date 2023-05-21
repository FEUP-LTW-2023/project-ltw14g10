<?php
    declare(strict_types=1);

    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/message.class.php');

    $db = getDatabaseConnection();

    $ticketId = isset($_SESSION['ticket_id']) ? $_SESSION['ticket_id'] : (int) $_POST['ticket_id'];
    $_SESSION['ticket_id'] = $ticketId;

    $messages = Message::getMessagesByTicket($db, $ticketId);

    require_once(__DIR__ . '/../templates/common.tpl.php');
    require_once(__DIR__ . '/../templates/chat.tpl.php');

    setHeader($session);
    drawHeader($session);
    drawBody($messages, $ticketId, $db, $session);
    drawFooter();
?>