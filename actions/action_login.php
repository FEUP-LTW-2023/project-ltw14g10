<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  $db = getDatabaseConnection();

  $customer = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

  if ($customer) {
    $session->setId($customer->id);
    $session->setName($customer->name);
    $session->addMessage('success', 'Login successful!');
    header('Location: /../pages/main-page.php');
  } else {
    $session->addMessage('error', 'Wrong password!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>