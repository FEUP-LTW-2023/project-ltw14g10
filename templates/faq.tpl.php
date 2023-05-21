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
        <div class="faq">
          <!-- faq question -->
          <h1 class="faq-page">What is an FAQ Page?</h1>
          <!-- faq answer -->
          <div class="faq-body">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
              necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
              aperiam.
              Perspiciatis, porro!</p>
          </div>
        </div>
        <hr class="hr-line">
        <div class="faq-two">
          <!-- faq question -->
          <h1 class="faq-page">Why do you need an FAQ page?</h1>
          <!-- faq answer -->
          <div class="faq-body">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
              necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
              aperiam.
              Perspiciatis, porro!</p>
          </div>
        </div>
        <hr class="hr-line">
        <div class="faq-three">
          <!-- faq question -->
          <h1 class="faq-page">Does it improves the user experience of a website?</h1>
          <!-- faq answer -->
          <div class="faq-body">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
              necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
              aperiam.
              Perspiciatis, porro!</p>
          </div>
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