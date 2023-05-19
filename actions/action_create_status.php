<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/status.class.php');

  $db = getDatabaseConnection();

  $status = Status::createStatus($db, $_POST["name"]);
  if (!$ticket){
    $session->addMessage('error', 'Error adding Ticket. Please Try later...');
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>