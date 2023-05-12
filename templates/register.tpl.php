<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../database/connection.db.php');
?>

<?php function drawHeaderRegister(Session $session) { ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Sign Up</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <header>
        <h1><a href="../pages/main-page.php">help.eic</a></h1>
    </header>
  <main>

<?php } ?>

<?php function drawFooterRegister() { ?>
    </main>

    <footer>
      help.eic Project &copy; 2023
    </footer>
  </body>
</html>
<?php } ?>

<?php function drawRegisterForm() { ?>
    <?php
      $db = getDatabaseConnection();
    ?>
    <p class="sign-title">Register</p>
    <form action="../actions/action_register.php" method="post">
        <input type="text" name="name" placeholder="Enter your name here" required />
        <input type="text" name="username" placeholder="Choose a username" required />
        <?php
          $username = $_POST['username'] ?? '';
          $usernameWarning = User::validateUsername($db, $username);
          if ($usernameWarning != '') {
            echo '<p class="warning">' . $usernameWarning . '</p>';
          }
        ?>
        <input type="text" name="email" placeholder="Enter your email address" required />
        <?php
          $email = $_POST['email'] ?? '';
          $emailWarning = User::validateEmail($db, $email);
          if ($emailWarning != '') {
            echo '<p class="warning">' . $emailWarning . '</p>';
          }
        ?>
        <input type="text" name="password" placeholder="Choose a password" required />
        <input type="text" name="confirm-password" placeholder="Confirm your password" required />
        <input type="submit" value="Sign up" />
    </form>
    <p class="bottom-text">
        <a href="../pages/login.php">Already have an account? Log in</a>
    </p>
<?php } ?>