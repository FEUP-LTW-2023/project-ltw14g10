<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
?>

<?php function setHeader(Session $session)
{ ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>help.eic</title>
    <link href="../css/main-style.css" rel="stylesheet">
    <link href="../css/common-style.css" rel="stylesheet">
    <script src="../javascript/animation.js" defer></script>
  </head>

  
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
    <a href="../pages/ticket-submit.php" id="ticket">Submit a ticket</a>


  <?php } ?>


  <?php function drawHeaderOptions()
  { ?>
  <div id="signup">
        <a href="../pages/contact.php" id="contact">Contact us</a>
        <a href="../pages/about.php" id="about">About</a>
        <a href="../pages/faq.php" id="faq">FAQ</a>
    </div>
    
  <?php } ?>