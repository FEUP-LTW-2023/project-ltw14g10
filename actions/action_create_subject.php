<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/subject.class.php');

  $db = getDatabaseConnection();
  
  $subject = Subject::createSubject($db, $_POST["code"], $_POST["subject_name"], $_POST["full_name"], (int) $_POST["year"]);
  if (!$subject){
    $session->addMessage('error', 'Error adding Ticket. Please Try later...');
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>