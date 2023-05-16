<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawHeader(Session $session)
{ ?>
  <body>

    <header class="main-header">
      <h1>
        <a href="../index.php">help.eic</a>
      </h1>

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
    <?php if ($current_page == "main-page.php") { ?>
    <section id="messages">
      <?php foreach ($session->getMessages() as $messsage) { ?>
        <article class="<?= $messsage['type'] ?>">
          <?= $messsage['text'] ?>
        </article>
      <?php } ?>
    </section>
    <?php } ?>

    <main>
<?php } ?>

<?php function drawLoginHeader()
{ ?>
  <div id="signup">
    <a href="../pages/login.php" id="login">Login</a>
    <a href="../pages/register.php" id="register">Register</a>
  </div>
<?php } ?>

<?php function drawLogoutHeader(Session $session)
{ ?>
  <div class="right-header">
    <?php drawAdminIcon(); ?>
    <?php drawMyTicketButton(); ?>
    <form action="../actions/action_logout.php" method="post" class="logout">
      <a href="../pages/profile.php">
       <?= $session->getName() ?>
      </a>
     <button type="submit">Logout</button>
   </form>
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
      João Figueiredo (202108829) & Francisco Campos (202108735)
      </div>
    </footer>
  </body>

  </html>
<?php } ?>

<?php function drawHeaderOptions()
  { ?>
  <div class="center-header">
        <a href="../pages/contact.php" id="contact">Contact us</a>
        <a href="../pages/about.php" id="about">About</a>
        <a href="../pages/faq.php" id="faq">FAQ</a>
    </div>
  <?php } ?>

<?php function drawMyTicketButton() {?>
    <a class="my-tickets-btn" href="../pages/my-tickets.php">
      My Tickets
    </a>
<?php } ?>

<?php function drawAdminIcon() { ?>
  <img src="../assests/shield_icon.png" alt="Admin Options" width="512" height="512" class="icon-shield">
<?php } ?>