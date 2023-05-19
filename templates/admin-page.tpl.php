<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../database/admin.class.php');
  require_once(__DIR__ . '/../database/agent.class.php');
  require_once(__DIR__ . '/../database/status.class.php');
  require_once(__DIR__ . '/../database/subject.class.php');
?>

<?php function setHeaderAdminPage() { ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Profile</title>
    <link rel="stylesheet" href="../css/admin-page-style.css" />
    <link rel="stylesheet" href="../css/common-style.css"/>
    <script src="../javascript/admin.js"></script>
</head>

<?php } ?>

<?php function adminMainCards() { ?>
  <a class="my-tickets-btn" href="../pages/my-tickets.php">
      My Tickets
  </a>
  <a class="my-tickets-btn" href="../pages/my-tickets.php">
      My Tickets
  </a>
  <a class="my-tickets-btn" href="../pages/my-tickets.php">
      My Tickets
  </a>
<?php } ?>

<?php function listAllUsers(array $users, PDO $db){ ?>
  <div class="user-container">
  <?php foreach($users as $user){ ?>
    <div class="user">
      <div class="username">
        <?php echo '@' . $user->username; ?>
      </div>
      <div class="email">
        <?php echo $user->email; ?>
      </div>
      <div class="name">
        <?php echo $user->name; ?>
      </div>
      <div class="role">
        <?php 
          $mode = -1;
          if(Admin::isAdmin($db,$user->id)) $mode=0;
          else if(Agent::isAgent($db, $user->id)) $mode=1;
          else $mode=2;
        ?>
          <select class="role-select" onchange="updateUserRole(<?php echo $user->id; ?>, this.value)">
            <option value="client" <?php echo ($mode == 2) ? 'selected' : ''; ?>>Client</option>
            <option value="agent" <?php echo ($mode == 1) ? 'selected' : ''; ?>>Agent</option>
            <option value="admin" <?php echo ($mode == 0) ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>
    </div>
  <?php } ?>
  </div>
<?php } ?>

<?php function listAllStatus(array $statuss){ ?>
  <div class="status-container">
  <?php 
      if($statuss == array()){
        echo '<p> No Status Available </p>';
      }
      foreach($statuss as $status){ ?>
    <div class="status" id="status-<?php echo $status->id; ?>">
      <div class="status-text">
        <?php echo $status->status_text; ?>
      </div>
      <button onclick="deleteStatus(<?php echo $status->id; ?>)">
        X
      </button>
    </div>
  <?php } ?>
  </div>
<?php } ?>

<?php function listAllSubjects(PDO $db){ ?>
  <div class="year-container">
    <?php for($i=1; $i<=3; $i++){ ?>
    <h2 class="year" id="year-<?php echo $i; ?>">Year <?php echo $i; ?></h2>
    <div class="subject-container">
      <?php
      $subjects = Subject::getSubjectsByYear($db,$i);
      foreach($subjects as $subject){ ?>
      <div class="subject">
        <div class="code">
        <?php echo $subject->code; ?>
        </div>
        <div class="subject-name">
          <?php echo $subject->subject_name; ?>
        </div>
        <div class="full-name">
          <?php echo $subject->full_name; ?>
        </div>
        <button onclick="">
          X
        </button>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
<?php } ?>

<?php function drawSubjectForm(){ ?>
  <div class="subject-form">
    <form action="../actions/action_create_subject.php" method="post">
      <input type="text" name="code" placeholder="Code" required>
      <input type="text" name="subject_name" placeholder="Subject Name" required>
      <input type="text" name="full_name" placeholder="Full Name" required>
      <select name="year" required>
        <option value="1">Year 1</option>
        <option value="2">Year 2</option>
        <option value="3">Year 3</option>
      </select>
      <input type="submit" value="+">
    </form>
  </div>
<?php } ?>

<?php function drawStatusForm(){ ?>
  <div class="status-form">
    <form action="../actions/action_create_status.php" method="post">
      <input type="text" name="status_text" placeholder="Status Text" required>
      <input type="submit" value="+">
    </form>
  </div>
<?php } ?>

<?php function drawForms(){ ?>
  <div class="forms">
    <?php drawSubjectForm(); ?>
    <?php drawStatusForm(); ?>
  </div>
<?php } ?>