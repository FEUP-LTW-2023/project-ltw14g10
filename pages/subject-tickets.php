<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/subject-tickets.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php'); 


  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  $tickets = Ticket::getUserTickets($db, $user->id);
  


  setHeaderMyTickets();
  drawHeader($session);
  drawTitle();
  foreach ($tickets as $ticket) {
    drawTicket($db,$ticket);
    ?>
    <button class="accordion">Answer</button>
    <?php
  }
  drawFooter();
?>