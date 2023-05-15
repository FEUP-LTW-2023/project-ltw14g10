<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../templates/main-page.tpl.php');
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
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/main-style.css" rel="stylesheet">
    <script src="../javascript/animation.js" defer></script>
  </head>

<?php } ?>