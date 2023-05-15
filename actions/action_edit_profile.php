<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  if (!User::usernameExists($db, $_POST['update_username']) && $user->name != $_POST['update_username']) {
    $user->updateUsername($db,$_POST['update_username']);
  } 
  if (!User::emailExists($db, $_POST['update_email']) && $user->email != $_POST['update_email']){
    $user->updateEmail($db, $_POST['update_email']);
  }
  if ($user->email != $_POST['update_name']){
    $user->updateName($db, $_POST['update_name']);
    $session->setName($user->name);
  }
  if ($user->verifyPassword($db, $_POST['old_password']) && $_POST['new_password'] == $_POST['confirm_password']){
    $user->updatePassword($db, $_POST['new_password']);
  }
  header('Location: /../pages/profile.php');

?>