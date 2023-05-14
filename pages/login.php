<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/login.tpl.php');
  require_once(__DIR__ . '/../templates/main-page.tpl.php');

  $db = getDatabaseConnection();

  setHeaderLogin($session);
  drawHeader($session);
  drawLoginForm();
  drawFooter();
?>