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
        <title>Contact help.eic</title>
        <link href="../css/common-style.css" rel="stylesheet">
        <link href="../css/info-style.css" rel="stylesheet">
        <script src="../javascript/animation.js" defer></script>
    </head>

<?php } ?>

<?php function drawBody()
{ ?>
    <section class="contact">
        <h2>Get in Touch</h2>
        <p>We are João Figueiredo and Francisco Campos, two passionate L.EIC students who have developed this
            project as part of our LTW class. We have put a lot of time and effort into creating the
            project, so we would love to hear from you if you have any questions or feedback.</p>
        <p>Please don't hesitate to reach out to us at the following email addresses:</p>
        <ul>
            <li>João Figueiredo: <a href="mailto:up202108829@up.pt">up202108829@up.pt</a>;</li>
            <li>Francisco Campos: <a href="mailto:up202108735@up.pt">up202108735@up.pt</a>;</li>
        </ul>
        <p>Thank you for checking out our project, and we look forward to hearing from you!</p>
    </section>
<?php } ?>