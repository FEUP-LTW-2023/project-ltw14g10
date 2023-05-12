<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawHeader(Session $session) { ?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>help.eic</title>
    <link href="../css/main-style.css" rel="stylesheet">
    <script src="../javascript/animation.js" defer></script>
</head>
<body>

    <header>
    <h1><a href="index.php">Home Page</a></h1>
        <div id="signup">
            <a href="pages/contact.php" id="contact">Contact us</a>
            <a href="pages/about.php" id="about">About</a>
            <a href="pages/faq.php" id="faq">FAQ</a>
        </div>
    
      <?php 
        if ($session->isLoggedIn()) drawLogoutHeader($session);
        else drawLoginHeader($session);
      ?>
    </header>
  
    <section id="messages">
      <?php foreach ($session->getMessages() as $messsage) { ?>
        <article class="<?=$messsage['type']?>">
          <?=$messsage['text']?>
        </article>
      <?php } ?>
    </section>

    <main>
<?php } ?>

<?php function drawBody() { ?>  
  <h1 class="hacker" data-value="help.eic">
        help.eic
    </h1>
    <?php } ?>

<?php function drawFooter() { ?>
    </main>

    <footer>
      help.eic Project &copy; 2023
    </footer>
  </body>
</html>
<?php } ?>

<?php function drawLoginHeader() { ?>
        <div id="signup">
            <a href="../pages/login.php" id="login">Login</a>
            <a href="../pages/register.php" id="register">Register</a>
        </div>
<?php } ?>

<?php function drawLogoutHeader(Session $session) { ?>
  <form action="../actions/action_logout.php" method="post" class="logout">
    <a href="../pages/profile.php"><?=$session->getName()?></a>
    <button type="submit">Logout</button>
  </form>
<?php } ?>