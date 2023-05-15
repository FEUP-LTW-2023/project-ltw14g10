<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  $db = getDatabaseConnection();

  if(!User::usernameExists($db, $_POST['username'])){
    $session->addMessage("error", "Username doesn't exist");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  else {
    $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

    if ($user) {
      $session->setId($user->id);
      $session->setName($user->name);
      $session->addMessage('success', 'Login successful!');
      header('Location: /../pages/main-page.php');
    } else {
      $session->addMessage('error', 'Wrong password');
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
?>