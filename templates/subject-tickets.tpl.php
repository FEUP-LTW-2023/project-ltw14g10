<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/agent.class.php');
require_once(__DIR__ . '/../database/ticket.class.php');
require_once(__DIR__ . '/../database/subject.class.php');
require_once(__DIR__ . '/../database/status.class.php');
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
    <link rel="stylesheet" href="../css/common-tickets-style.css" />
    <link rel="stylesheet" href="../css/common-style.css" />
    <script src="../javascript/common-tickets.js"></script>
  </head>

<?php } ?>

<?php function drawTitle(string $subject_name)
{ ?>
  <div class="container">
    <h1 class="upcomming"><?php echo $subject_name; ?> TICKETS</h1>

  <?php } ?>

  <?php function drawFilters(PDO $db, int $subject, $order){ ?>
    <div class="filters">
      <div class="filter">
        <p>Filter by Status:</p>
        <select name="status" id="status-selector" onchange="filterByStatus(this.value, <?php echo $subject; ?>)">
          <option value="all" selected>All</option>
          <?php
          $statusArray = Status::getAllStatus($db);
          foreach ($statusArray as $status) { ?>
            <option value="<?php echo $status->id; ?>">
              <?php echo $status->status_text; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="filter">
        <p>Filter by Agent:</p>
        <select name="agent" id="agent-selector" onchange="filterByAgent(this.value, <?php echo $subject; ?>)">
          <option value="all" selected>All</option>
          <?php
          $agents = Agent::getAllAgentsBySubject($db, $subject);
          foreach ($agents as $agent) { ?>
            <option value="<?php echo $agent->user; ?>">
              <?php echo User::getName($db, $agent->user); ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <form class="filter" id="order-form" action="../pages/subject-tickets.php" method="post">
        <p>Sort by Date:</p>
        <select name="order" id="order-selector" onchange="orderByDate()">
          <option value="" <?php echo ($order == false ? "selected":""); ?>>Select Order</option>
          <option value="newest" <?php echo ($order == "newest" ? "selected":""); ?>>Newest</option>
          <option value="oldest" <?php echo ($order == "oldest" ? "selected":""); ?>>Oldest</option>
        </select>
      </form>
    </div>
  <?php } ?>


  <?php function drawTicket(PDO $db, Ticket $ticket)
  { ?>
    <div class="item">
      <div class="item-right">
        <h2 class="num">
          <?php
          echo date("j", strtotime($ticket->time));
          ?>
        </h2>
        <p class="day">
          <?php
          $months = array(
            1 => "Jan",
            2 => "Feb",
            3 => "Mar",
            4 => "Apr",
            5 => "May",
            6 => "Jun",
            7 => "Jul",
            8 => "Aug",
            9 => "Sep",
            10 => "Oct",
            11 => "Nov",
            12 => "Dec"
          );
          echo $months[date("n", strtotime($ticket->time))];
          ?>
        </p>
        <span class="up-border"></span>
        <span class="down-border"></span>
      </div> <!-- end item-right -->

      <div class="item-left">
      <a href="ticket-info.php?id=<?php echo $ticket->id; ?>" class="plus-sign">&#43;</a>

        <p class="event">Ticket
          #<?php echo $ticket->id ?>
        </p>
        <h2 class="title">
          <?php echo $ticket->title ?>
        </h2>
        <div class="sce">
          <div class="icon">
            <i class="fa fa-table"></i>
          </div>
          <p>Client: <?php echo User::getName($db, $ticket->client) ?> <br />

            Agent: <?php
            $agents = Agent::getAllAgentsBySubject($db, $ticket->subject); ?>
            <select name="agent" class="agent-selector" onchange='updateTicketAgent(<?php echo $ticket->id ?>, this.value, <?php echo ($ticket->agent == null ? "true":"false");?>)'>
                <?php if ($ticket->agent == null) { ?>
                  <option value="" selected disabled>Not assigned</option>
                <?php } else {?>
                    <option value="" disabled>Not assigned</option>
                <?php } ?>
              <?php foreach ($agents as $agent) { ?>
                <option value="<?php echo $agent->user; ?>" <?php if ($ticket->agent == $agent->user) echo "selected"; ?> <?php if ($ticket->client == $agent->user) echo "disabled"; ?>>
                  <?php echo User::getName($db, $agent->user); ?>
                </option>
              <?php } ?>
            </select>
            </p>
          </div>
          <div class="fix"></div>
          <div class="loc">
            <div class="icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <p>
            <?php 
              $subjects = Subject::getAllSubjects($db);
            ?>
              <select name="subject" class="subject-selector" onchange="updateTicketSubject(<?php echo $ticket->id ?>, this.value)">
                <?php foreach ($subjects as $subject) { ?>
                  <option value="<?php echo $subject->id; ?>" <?php if ($ticket->subject == $subject->id) echo "selected"; ?>>
                    <?php echo $subject->code . " - " . $subject->subject_name; ?>
                  </option>
                <?php } ?>
              </select>
          </p>
        </div>
        <div class="fix"></div>
        <?php
          $statusArray = Status::getAllStatus($db);
          ?>
          <select name="status" class="status-selector" onchange="updateTicketStatus(<?php echo $ticket->id ?>, this.value)">
            <?php foreach ($statusArray as $status) { ?>
              <?php $className = strtolower(str_replace(' ', '-', $status->status_text)); ?>
              <option class="<?php echo $className; ?>"  value="<?php echo $status->id; ?>" <?php if ($ticket->status == $status->id) echo "selected"; ?>>
                <?php echo $status->status_text; ?>
              </option>
            <?php } ?>
        </select>
      </div>
    </div>


  <?php } ?>