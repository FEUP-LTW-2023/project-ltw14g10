<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/ticket.class.php');
require_once(__DIR__ . '/../database/subject.class.php');
require_once(__DIR__ . '/../database/status.class.php');
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

<?php function drawTicketInfo(PDO $db, int $id)
{ ?>

    <?php $ticket = Ticket::getTicket($db,$id)?>

  <div class="container">
    <div class="title">Ticket #<?php echo $ticket->id; ?></div>
    <div class="ticket-info">
      <div class="ticket-subject">
        <div class="subject-title">Subject</div>
        <div class="subject">
          <?php  
            $subject = Subject::getSubject($db, $ticket->subject);
              
            echo "$subject->code $subject->subject_name <br /> $subject->full_name";?>
        </div>
      </div>
      <div class="ticket-description">
        <div class="description-title">Description</div>
        <div class="description"><?php echo $ticket->description; ?></div>
      </div>
      <div class="ticket-status">
        <div class="status-title">Status</div>
        <div class="status">
          <?php 
            $status = Status::getStatus($db, $ticket->status);
            echo $status->status_text; ?></div>
      </div>
      <div class="ticket-time">
        <div class="time-title">Time</div>
        <div class="time"><?php echo $ticket->time; ?></div>
      </div>
    </div>
    <div class="ticket-actions">
      <a href="../pages/ticket-submit.php" class="change-ticket-btn">Change ticket</a>
      <form action="../actions/action_delete_ticket.php" method="post" class="delete-ticket-form">
        <input type="hidden" name="ticket_id" value="<?php echo $ticket->id; ?>">
        <button type="submit">Delete ticket</button>
      </form>
    </div>
  </div>

<?php } ?>