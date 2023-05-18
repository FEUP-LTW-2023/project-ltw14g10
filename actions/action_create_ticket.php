<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/ticket.class.php');

  $db = getDatabaseConnection();
  
  date_default_timezone_set("Europe/Lisbon");
  $time = date("Y-m-d H:i:s");

  $ticket = Ticket::createTicket($db, $session->getId(), (int) $_POST["subject"], $_POST["title"], $_POST["description"], $time);
  if ($ticket){
    $session->addMessage('success', 'Ticket added!');
    header('Location: /../pages/main-page.php');
  } else {
    $session->addMessage('error', 'Error adding Ticket. Please Try later...');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>