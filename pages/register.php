<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/register.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php');

  $db = getDatabaseConnection();

  setHeaderRegister($session);
  drawHeader($session);
  drawRegisterForm($session);
  drawFooter();
  $session->clearMessages();
?>
