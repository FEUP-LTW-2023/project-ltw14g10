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
    <link href="../css/ticket-submit-style.css" rel="stylesheet">
    <script src="../javascript/animation.js" defer></script>
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
    <form action="/action_page.php"> 
    <select id="Class" name="class"> 
        <option>L.EIC001 - ALGA</option> 
        <option>L.EIC002 - AM I</option> 
        <option>L.EIC003 - FSC</option> 
        <option>L.EIC004 - MD</option> 
        <option>L.EIC005 - FP</option> 
        <option>L.EIC006 - AC</option> 
        <option>L.EIC007 - AM II</option> 
        <option>L.EIC008 - F I</option> 
        <option>L.EIC009 - P</option> 
        <option>L.EIC010 - TC</option> 
        <option>L.EIC011 - AED</option> 
        <option>L.EIC012 - BD</option> 
        <option>L.EIC013 - F II</option> 
        <option>L.EIC014 - LDTS</option> 
        <option>L.EIC015 - SO</option> 
        <option>L.EIC016 - DA</option> 
        <option>L.EIC017 - ES</option> 
        <option>L.EIC018 - LC</option> 
        <option>L.EIC019 - LTW</option> 
        <option>L.EIC020 - ME</option> 
        <option>L.EIC021 - FSI</option> 
        <option>L.EIC022 - IPC</option> 
        <option>L.EIC023 - LBAW</option> 
        <option>L.EIC024 - PFL</option> 
        <option>L.EIC025 - RC</option> 
        <option>L.EIC026 - C</option> 
        <option>L.EIC027 - CG</option> 
        <option>L.EIC028 - CPD</option> 
        <option>L.EIC029 - IA</option>
        <option>L.EIC030 - PI</option> 
    </select>

    <label for="subject">Subject</label> 
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea> 
    <input type="submit" value="Submit">
    
    </form> 
      
    </div> 
  </div> 
<?php 
} 
?>
