<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/ticket.class.php');
require_once(__DIR__ . '/../database/subject.class.php');
require_once(__DIR__ . '/../database/status.class.php');
require_once(__DIR__ . '/../database/user.class.php');

?>

<?php function setHeaderHistory()
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>help.eic Ticket History</title>
        <link rel="stylesheet" href="../css/ticket-history-style.css" />
        <link rel="stylesheet" href="../css/common-style.css" />
    </head>

<?php } ?>

<?php function drawMockTicketHistory(int $ticketId)
{
    ?>
    <div class="ticket-history">
        <h2 class="title">Ticket History</h2>
        <div class="history-item">
            <div class="history-details">
                <div class="history-date">May 15, 2023</div>
                <div class="history-user">Agent: John Doe</div>
            </div>
            <div class="history-description">
                <p>Ticket status changed to "In Progress".</p>
                <p>Assigned to Agent: John Doe.</p>
            </div>
        </div>
        <div class="history-item">
            <div class="history-details">
                <div class="history-date">May 14, 2023</div>
                <div class="history-user">Agent: Jane Smith</div>
            </div>
            <div class="history-description">
                <p>Ticket status changed to "Open".</p>
            </div>
        </div>
        <div class="back-button">
            <form method="post" action="../pages/ticket-info.php">
                <input type="hidden" name="id" value="<?php echo $ticketId ?>">
                <button type="submit" class="back-button-style">Back to Ticket Info</button>
            </form>
        </div>
    </div>

    </div>
    <?php
}