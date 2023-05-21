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
    <title>About help.eic</title>
    <link href="../css/common-style.css" rel="stylesheet">
    <link href="../css/info-style.css" rel="stylesheet">
    <script src="../javascript/animation.js" defer></script>
  </head>

<?php } ?>

<?php function drawBody() { ?>
    <section class="about">
        <h2>About help.eic</h2>
        <p>Welcome to help.eic, the one-stop destination for academic 
            assistance. We are a team of dedicated alumni from the 
            L.EIC (Licenciatura em Engenharia Informática e Computacão)
             course at FEUP (Faculdade de Engenharia da Universidade
              do Porto), who understand the challenges that come with 
              pursuing a degree in computer science.</p>
        <p>Our mission is to provide a platform where students can submit
             tickets for academic assistance and receive help from fellow
              students who have already taken the same courses. We believe
               that peer-to-peer learning can be a powerful tool for 
               academic success, and that by working together, we can
                help each other achieve our goals.</p>
        <p>At help.eic, we strive to create a supportive community where 
            students can feel comfortable asking for help and getting the
             assistance they need to succeed. Our team of experienced 
             alumni is dedicated to providing tailored solutions to
              each student's individual needs, ensuring that everyone 
              gets the help they need to achieve academic success.</p>
        <p>We believe that education is a journey, and that everyone 
            deserves the support they need to succeed. Whether you're
             struggling with a particular subject or just need help with
              a specific problem, we're here to help. With help.eic, you
               can be confident that you're getting the best academic 
               assistance available, from a team of dedicated and experienced
                alumni.</p>
        <p>Thank you for choosing help.eic, and we look forward to 
            supporting you on your academic journey.</p>
    </section>
<?php } ?>


