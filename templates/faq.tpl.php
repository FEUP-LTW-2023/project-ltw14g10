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
    <title>help.eic FAQ</title>
    <link href="../css/info-style.css" rel="stylesheet">
    <link href="../css/common-style.css" rel="stylesheet">
    <script src="../javascript/faq.js" defer></script>
    <script src="../javascript/classes.js" defer></script>
  </head>

<?php } ?>

<?php function drawBody()
{ ?>
  <?php drawFAQSubjectSelector(); ?>
  <body>
    <main>
      <section class="faq-container">
        <div class="intro-faq">
          <h1 class='faq-page'>Welcome to the FAQ Page!</h1>
          <div class='faq-body'>
          <p>Here you can find the most frequently asked questions about the course units of L.EIC. Select your subject and get started!</p>
          </div>
      </section>
    </main>
  </body>
<?php } ?>

<?php function drawFAQSubjectSelector(){ ?>
  <select class="year" name="year" onchange="getSubjects(this.value)" required>
    <option value="" disabled selected>Select year</option>
    <option value="1">1st year</option>
    <option value="2">2nd year</option>
    <option value="3">3rd year</option>
  </select>
  <select class='subjectContainer' name='subject' onchange="getFAQsSubject(this.value)" required>
    <option value="" disabled selected>Select subject</option>
  </select>
<?php } ?>