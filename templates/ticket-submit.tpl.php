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
    <title>Ticket Submit help.eic</title>
    <link href="../css/common-style.css" rel="stylesheet">
    <link href="../css/ticket-submit-style.css" rel="stylesheet">
    <script src="../javascript/classes.js" defer></script>
  </head>

<?php } ?>

<?php
function drawBody()
{
  ?>
  <div class="container">
    <div class="title">
      <h2>Submit your ticket</h2>
      <p>Your problem about to be solved soon, we'll be working on it!</p>
    </div>
    <div class="column">
      <form action="/../actions/action_create_ticket.php" method="post">

        <select class="year" name="year" onchange="getSubjects(this.value)">
          <option value="" disabled selected>Select year</option>
          <option value="1">1st year</option>
          <option value="2">2nd year</option>
          <option value="3">3rd year</option>
        </select>


        <div class="subjectContainer"></div>


        <input type="text" name="title" placeholder="Title:"></textarea>
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">

      </form>

    </div>
  </div>
  <?php
}
?>