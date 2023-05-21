<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/chat.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../database/message.class.php');

  $db = getDatabaseConnection();
  
  $messages = Message::getMessagesByTicket($db, 1);

  setHeader($session);
  drawHeader($session);
  drawBody($messages,$db);
  drawFooter();
?>

