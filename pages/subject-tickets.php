<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/subject-tickets.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php'); 


  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  $agent = Agent::getAgent($db, $user->id);

  $tickets = Ticket::getSubjectTickets($db, $agent->subject);

  $subject = Subject::getSubject($db, $agent->subject);


  setHeaderMyTickets();
  drawHeader($session);
  drawTitle($subject->subject_name);
  drawFilters($db, $agent->subject, $tickets);
  drawTickets($db, $tickets);
  drawFooter();
?>