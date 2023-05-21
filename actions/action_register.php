<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../utils/session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../database/client.class.php');

  $db = getDatabaseConnection();

  $validRegister = true;

  if (User::usernameExists($db, $_POST['username'])) {
    $validRegister = false;
    $session->addMessage('error', 'Username already exists');
  } 
  if (User::emailExists($db, $_POST['email'])){
    $validRegister = false;
    $session->addMessage('error', 'Email already exists');
  }
  if ($_POST['password'] != $_POST['confirm-password']){
    $validRegister = false;
    $session->addMessage('error', "Passwords don't match");
  }
  if($validRegister){
    $user = User::registerUser($db, $_POST['username'], $_POST['password'], $_POST['email'], $_POST['name']);
    $session->setId($user->id);
    $session->setName($user->name);
    Client::addClient($db,$user->id);
    $session->addMessage('success', 'Registration successful!');
    header('Location: /../pages/main-page.php');
  }
  else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>