<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/ticket-info.tpl.php');
require_once(__DIR__ . '/../templates/common.tpl.php');

$db = getDatabaseConnection();
$ticket = Ticket::getTicket($db, (int) $_GET['id']);
setHeaderTicket();
drawHeader($session);
drawTicketInfo($db, $ticket);
drawFooter();
?>