<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/user.class.php');
?>

<?php function setHeaderMyTickets() { ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Profile</title>
    <link rel="stylesheet" href="../css/my-tickets-style.css" />
    <link rel="stylesheet" href="../css/common-style.css"/>
</head>

<?php } ?>

<?php function drawSwitchMode() { ?>
  <div class="flex-switch">
    <div id="client">Client</div>
    <label class="switch">
      <input type="checkbox" checked>
      <span class="slider round"></span>
    </label>
    <div id="agent">Agent</div>
  </div>
<?php } ?>