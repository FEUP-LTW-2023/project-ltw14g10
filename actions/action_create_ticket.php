<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/ticket.class.php');

  $db = getDatabaseConnection();

  $ticket = Ticket::createTicket($db, $session->getId(), (int) $_POST["subject"], $_POST["title"], $_POST["description"]);
  if ($ticket){
    $session->addMessage('success', 'Ticket added!');
    header('Location: /../pages/main-page.php');
  } else {
    $session->addMessage('error', 'Error adding Ticket. Please Try later...');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>