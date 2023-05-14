<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
?>

<?php function setHeaderMain(Session $session)
{ ?>
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

  
<?php } ?>

<?php function drawHeader(Session $session)
{ ?>
  <body>

    <header>
      <h1><a href="../index.php">help.eic</a></h1>

      <?php
      $current_page = basename($_SERVER['PHP_SELF']);
      if ($current_page == "main-page.php") {
        drawHeaderOptions();
      }?>

      <?php
      if($current_page != "login.php" && $current_page != "register.php"){
        if ($session->isLoggedIn())
          drawLogoutHeader($session);
        else
          drawLoginHeader($session);}
      ?>
    </header>

    <section id="messages">
      <?php foreach ($session->getMessages() as $messsage) { ?>
        <article class="<?= $messsage['type'] ?>">
          <?= $messsage['text'] ?>
        </article>
      <?php } ?>
    </section>

    <main>
<?php } ?>

  <?php function drawBody()
  { ?>
    <h1 class="hacker" data-value="help.eic">help.eic</h1>
    <h1 class="sub"> From students, for students!</h2> 
    <p class="description"> Welcome to help.eic, the one-stop destination for academic assistance. We all know 
       L.EIC (FEUP) can be challenging, and sometimes all you need is just a little help!
      Whether you are facing difficulties in a particular subject or just need help with a specific problem,
       we are here to support you. Our team of dedicated alumni is well-equipped to handle a diverse range 
       of academic challenges and provide you with tailored solutions. Simply submit a ticket, 
       and we'll take it from there. At help.eic, we strive to make your academic success a reality!</p>


  <?php } ?>

  <?php function drawHeaderOptions()
  { ?>
  <div id="signup">
        <a href="../pages/contact.php" id="contact">Contact us</a>
        <a href="../pages/about.php" id="about">About</a>
        <a href="../pages/faq.php" id="faq">FAQ</a>
    </div>
    
  <?php } ?>
  

  <?php function drawFooter()
  { ?>
    </main>

    <footer>

      <div class="footer-left">
        help.eic Project &copy; 2023
      </div>

      <div class="footer-right">
      João Figueiredo (202108829) & Francisco Campos (xxxxxxxx)
      </div>
    </footer>
  </body>

  </html>
<?php } ?>
 
<?php function drawLoginHeader($session)
{ ?>
  <div id="signup">
    <a href="../pages/login.php" id="login">Login</a>
    <a href="../pages/register.php" id="register">Register</a>
  </div>
<?php } ?>

<?php function drawLogoutHeader(Session $session)
{ ?>
  <form action="../actions/action_logout.php" method="post" class="logout">
    <a href="../pages/profile.php">
      <?= $session->getName() ?>
    </a>
    <button type="submit">Logout</button>
  </form>
<?php } ?>