<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/ticket.class.php');
require_once(__DIR__ . '/../database/subject.class.php');
require_once(__DIR__ . '/../database/status.class.php');
require_once(__DIR__ . '/../database/user.class.php');

?>

<?php function setHeaderTicket()
{ ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Ticket</title>
    <link rel="stylesheet" href="../css/ticket-info-style.css" />
    <link rel="stylesheet" href="../css/common-style.css" />
  </head>

<?php } ?>

<?php function drawTicketInfo(PDO $db, Ticket $ticket)
{ ?>


  <div class="container">
    <div class="title">Ticket #<?php echo "$ticket->id - $ticket->title" ?></div>
    <div class="ticket-info">
      <div class="ticket-subject">
        <div class="subtitle">Subject</div>
        <div class="subject">
          <?php  
            $subject = Subject::getSubject($db, $ticket->subject);
              
            echo "$subject->code $subject->subject_name <br /> $subject->full_name";?>
        </div>
      </div>
      <div class="ticket-description">
        <div class="subtitle">Description</div>
        <div class="description"><?php echo $ticket->description; ?></div>
      </div>
      <div class="ticket-agent">
        <div class="subtitle">Agent</div>
        <div class="agent">
          <?php 
            if ($ticket->agent == null) {
              echo "No agent assigned";
            } else {
            $agent = User::getUser($db, $ticket->agent);
            echo $agent->name;} ?></div>
        </div>
        <div class="ticket-client">
          <div class="subtitle">Client</div>
          <div class="client">
            <?php
              $client = User::getUser($db, $ticket->client);
              echo $client->name; ?></div>
        </div>
    
      <div class="ticket-status">
        <div class="subtitle">Status</div>
        <div class="status">
          <?php 
            $status = Status::getStatus($db, $ticket->status);
            echo $status->status_text; ?></div>
      </div>
      <div class="ticket-time">
        <div class="subtitle">Time</div>
        <div class="time"><?php echo $ticket->time; ?></div>
      </div>
    </div>
    <div class="ticket-buttons">
      <div class="ticket-history">
      <form method="post" action="../pages/ticket-history.php">
        <input type="hidden" name="ticket_id" value="<?php echo $ticket->id; ?>">
        <button type="submit" class="history-button">View Ticket History</button>
      </form>
      </div>
      <div class="ticket-chat">
      <form action="../pages/chat.php" method="POST">
          <input type="hidden" name="ticket_id" value="<?php echo $ticket->id; ?>">
          <button type="submit" class="chat-button">Open Chat</button>
      </form>
      </div>
    </div>

    
    
  </div>

<?php } ?>