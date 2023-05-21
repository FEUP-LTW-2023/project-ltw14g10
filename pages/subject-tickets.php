<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/subject-tickets.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php'); 


  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  $tickets = Ticket::getSubjectTickets($db, $user->id);

  $agent = Agent::getAgent($db, $user->id);

  $subject = Subject::getSubject($db, $agent->subject);


  setHeaderMyTickets();
  drawHeader($session);
  drawTitle($subject->subject_name);
  foreach ($tickets as $ticket) {
    drawTicket($db,$ticket);
  }
  drawFooter();
?>