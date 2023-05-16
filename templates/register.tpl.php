<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
?>

<?php function setHeader(Session $session)
{ ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Sign Up</title>
    <link rel="stylesheet" href="../css/sign-style.css" />
    <link rel="stylesheet" href="../css/common-style.css" />
  </head>

<?php } ?>

<?php function drawForm(Session $session)
{ ?>
  <p class="sign-title">Register</p>
  <form action="../actions/action_register.php" method="post">
    <div class="input-box">
      <input type="text" name="name" placeholder="Enter your name here" required />
      <input type="text" name="username" placeholder="Choose a username" required />
      <?php drawValidateUsername($session); ?>
      <input type="email" name="email" placeholder="Enter your email address" required />
      <?php drawValidateEmail($session); ?>
      <input type="password" name="password" placeholder="Choose a password" required />
      <input type="password" name="confirm-password" placeholder="Confirm your password" required />
      <?php drawValidatePassword($session); ?>
      <input type="submit" value="Sign up" />
    </div>
  </form>
  <p class="bottom-text">
    <a href="../pages/login.php" class="bottom-text">Already have an account? Log in</a>
  </p>
<?php } ?>

<?php function drawValidateEmail(Session $session)
{ ?>
  <div class="error-message">
    <?php
    foreach ($session->getMessages() as $message) {
      if ($message['text'] == 'Email already exists') {
        echo 'Email already exists';
      }
    }
    ?>
  </div>
<?php } ?>

<?php function drawValidateUsername(Session $session)
{ ?>
  <div class="error-message">
    <?php
    foreach ($session->getMessages() as $message) {
      if ($message['text'] == 'Username already exists') {
        echo 'Username already exists';
      }
    }
    ?>
  </div>
<?php } ?>

<?php function drawValidatePassword(Session $session)
{ ?>
  <div class="error-message">
    <?php
    foreach ($session->getMessages() as $message) {
      if ($message['text'] == "Passwords don't match") {
        echo "Passwords don't match";
      }
    }
    ?>
  </div>
<?php } ?>