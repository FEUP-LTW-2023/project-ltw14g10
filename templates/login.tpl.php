<?php 
  declare(strict_types = 1); 

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
  <title>help.eic Login</title>
  <link rel="stylesheet" href="../css/sign-style.css" />
  <link rel="stylesheet" href="../css/common-style.css" />

</head>

  
<?php } ?>


<?php function drawForm(Session $session) { ?>
    <p class="sign-title">Log in</p>
  <form action="../actions/action_login.php" method="post">
    <div class = "input-box">
      <input type="text" name="username" placeholder="Username" />
      <?php drawValidateUsername($session) ?>
      <input type="password" name="password" placeholder="Password" />
      <?php drawValidatePassword($session) ?>
    </div>
    <input type="hidden" name="csrf" value="<?=$session->getCSRF()?>">
    <input type="submit" value="Sign in" />
  </form>
  <p class="bottom-text">
    <a href="../pages/register.php" class="bottom-text">Don't have an account? Sign up</a>
  </p>
<?php } ?>

<?php function drawValidateUsername(Session $session) { ?>
  <div class="error-message">
    <?php
    foreach($session->getMessages() as $message){
      if ($message['text'] == "Username doesn't exist"){
        echo "Username doesn't exist";
      }
    }
    ?>
  </div>
<?php } ?>


<?php function drawValidatePassword(Session $session) { ?>
  <div class="error-message">
    <?php
    foreach($session->getMessages() as $message){
      if ($message['text'] == 'Wrong password'){
        echo 'Wrong password';
      }
    }
    ?>
  </div>
<?php } ?>