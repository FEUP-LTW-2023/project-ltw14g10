<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawHeaderLogin(Session $session) { ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>help.eic Login</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
  <header>
    <h1><a href="../pages/main-page.php">help.eic</a></h1>
  </header>
  <main>

<?php } ?>

<?php function drawFooterLogin() { ?>
    </main>

    <footer>
      help.eic Project &copy; 2023
    </footer>
  </body>
</html>
<?php } ?>

<?php function drawLoginForm() { ?>
    <p class="sign-title">Log in</p>
  <form action="../actions/action_login.php" method="post">
    <div class = "input-box">
      <input type="text" name="username" placeholder="Username" />
      <input type="password" name="password" placeholder="Password" />
    </div>
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