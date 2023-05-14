<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
?>
<?php function setHeaderLogin(Session $session)
{ ?>
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>help.eic Login</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/main-style.css" />

</head>

  
<?php } ?>


<?php function drawLoginForm() { ?>
    <p class="sign-title">Log in</p>
  <form action="login.php" method="post">
    <input type="text" name="username" placeholder="Username" />
    <input type="text" name="password" placeholder="Password" />
    <input type="submit" value="Sign in" />
  </form>
  <p class="bottom-text">
    <a href="../pages/register.php">Don't have an account? Sign up</a>
  </p>
  <p class="bottom-text">
    <a href="forgot-password.html">Forgot your password? Reset it</a>
  </p>
  <p class="bottom-text">
    <a href="forgot-username.html">Forgot your username? Reset it</a>
  </p>
<?php } ?>