<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/user.class.php');
?>

<?php function setHeaderMyTickets()
{ ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Profile</title>
    <link rel="stylesheet" href="../css/my-tickets-style.css" />
    <link rel="stylesheet" href="../css/common-style.css" />
  </head>

<?php } ?>

<?php function drawSwitchMode()
{ ?>
  <div class="flex-switch">
    <div id="client">Client</div>
    <label class="switch">
      <input type="checkbox" checked>
      <span class="slider round"></span>
    </label>
    <div id="agent">Agent</div>
  </div>
<?php } ?>

<?php function drawTitle()
{ ?>
  <div class="container">
  <h1 class="upcomming">YOUR TICKETS</h1>

<?php } ?>

<?php function drawMockTicketOpen()
{ ?>
  <div class="item">
    <div class="item-right">
      <h2 class="num">23</h2>
      <p class="day">Feb</p>
      <span class="up-border"></span>
      <span class="down-border"></span>
    </div> <!-- end item-right -->
    
    <div class="item-left">
      <p class="event">Ticket #1</p>
      <h2 class="title">VSCODE</h2>
      
      <div class="sce">
        <div class="icon">
          <i class="fa fa-table"></i>
        </div>
        <p>Client: Francisco Bettencourt <br/> Agent: Francisco Campos</p>
      </div>
      <div class="fix"></div>
      <div class="loc">
        <div class="icon">
          <i class="fa fa-map-marker"></i>
        </div>
        <p>L.EIC0009<br/> Programação</p>
      </div>
      <div class="fix"></div>
      <button class="open">Open</button>
    </div> <!-- end item-right -->
  </div> <!-- end item -->
 

<?php } ?>

<?php function drawMockTicketClosed()
{ ?>
  
  <div class="item">
    <div class="item-right">
      <h2 class="num">23</h2>
      <p class="day">Feb</p>
      <span class="up-border"></span>
      <span class="down-border"></span>
    </div> <!-- end item-right -->
    
    <div class="item-left">
      <p class="event">Ticket #1</p>
      <h2 class="title">VSCODE</h2>
      
      <div class="sce">
        <div class="icon">
          <i class="fa fa-table"></i>
        </div>
        <p>Client: Francisco Bettencourt <br/> Agent: Francisco Campos</p>
      </div>
      <div class="fix"></div>
      <div class="loc">
        <div class="icon">
          <i class="fa fa-map-marker"></i>
        </div>
        <p>L.EIC0009<br/> Programação</p>
      </div>
      <div class="fix"></div>
      <button class="closed">Closed</button>
      </div> <!-- end item-right -->
  </div> <!-- end item -->
    
 

<?php } ?>

