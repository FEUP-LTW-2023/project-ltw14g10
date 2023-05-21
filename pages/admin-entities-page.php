<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');

  require_once(__DIR__ . '/../templates/admin-page.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php');

  if(!$session->isLoggedIn()) {
    header('Location: ../pages/login.php');
    die();
  }

  $db = getDatabaseConnection();

  if(!Admin::isAdmin($db, $session->getId())) {
    $session->addMessage('error', 'You do not have permission to access this page.');
    header('Location: ../pages/main-page.php');
    die();
  }

  $statuss = Status::getAllStatus($db);

  setHeaderAdminPage();
  drawHeader($session);
  drawForms();
  listAllStatus($statuss);
  listAllSubjects($db);
  drawFooter();
?>