<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/admin.class.php');
  require_once(__DIR__ . '/../database/agent.class.php');
?>

<?php function drawHeader(PDO $db, Session $session)
{ ?>
  <body>

    <header class="main-header">
      <h1>
        <a href="../index.php" class="left-header">help.eic</a>
      </h1>

      <?php
      $current_page = basename($_SERVER['PHP_SELF']);
      if($current_page != "login.php" && $current_page != "register.php"){

        drawHeaderOptions();

        if ($session->isLoggedIn())
          drawLogoutHeader($db, $session);
        else
          drawLoginHeader($session);}
      ?>
    </header>
    <?php if ($current_page == "main-page.php" || $current_page == "my-tickets.php") { ?>
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
  <div class="right-header">
    <a href="../pages/login.php" id="login">Login</a>
    <a href="../pages/register.php" id="register">Register</a>
  </div>
<?php } ?>

<?php function drawLogoutHeader(PDO $db, Session $session)
{ ?>
  <div class="right-header">
    <?php drawAdminIcon($db, $session); ?>
    <?php drawSubjectTicketButton($db, $session); ?>
    <?php drawMyTicketsButton(); ?>
    <?php drawProfileIcon(); ?>
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

<?php function drawMyTicketsButton() {?>
    <a class="my-tickets-btn" href="../pages/my-tickets.php">
      My Tickets
    </a>
<?php } ?>

<?php function drawAdminIcon(PDO $db, Session $session) { ?>
  <?php if(Admin::isAdmin($db, $session->getId())){ ?>
  <a href="../pages/admin-page.php" id="shield">
    <img src="../assets/shield_icon.png" alt="Admin Options" width="512" height="512" class="icon-shield">
  </a>
  <?php } ?>
<?php } ?>

<?php function drawProfileIcon() { ?>
  <a href="../pages/profile.php" id="profile">
    <img src="../assets/user_icon_blue.png" alt="Admin Options" width="382" height="382" class="icon-user">
  </a>
<?php } ?>

<?php function drawSubjectTicketButton(PDO $db, Session $session) {?>
  <?php if(Agent::isAgent($db, $session->getId())){ ?>
    <a class="subject-tickets-btn" href="../pages/subject-tickets.php">
      Subject Tickets
    </a>
  <?php } ?>
<?php } ?>

<?php function drawTickets(PDO $db, array $tickets) { ?>
  <?php foreach ($tickets as $ticket) { ?>
    <div id="ticket-<?php echo $ticket->id; ?>" class="ticket">
      <?php drawTicket($db, $ticket); ?>
    </div>
  <?php } ?>
<?php } ?>