<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/my-tickets.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php');

  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  setHeaderMyTickets();
  drawHeader($session);
  drawSwitchMode();
  drawTitle();
  drawMockTicketOpen();
  drawMockTicketClosed();
  drawMockTicketOpen();
  drawMockTicketClosed();
  drawFooter();
?>