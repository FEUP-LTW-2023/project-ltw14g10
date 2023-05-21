<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/ticket-submit.tpl.php');

  if(!$session->isLoggedIn()) {
    header('Location: ../pages/login.php');
    die();
  }

  $db = getDatabaseConnection();

  setHeader($session);
  drawHeader($db, $session);
  drawBody();
  drawFooter();
?>
