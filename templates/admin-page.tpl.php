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
    <script src="../javascript/classes.js"></script>
</head>

<?php } ?>

<?php function adminMainCards() { ?>
  <div class="cards-container">
    <a class="info-card" href="../pages/admin-users-page.php">
        Users & Roles
    </a>
    <a class="info-card" href="../pages/admin-entities-page.php">
        Subjects & Status
    </a>
    <a class="info-card" href="../pages/admin-assign-page.php">
        Assign Agents
    </a>
  </div>
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
  <?php foreach($statuss as $status){ ?>
    <div class="status" id="status-<?php echo $status->id; ?>">
      <div class="status-text">
        <?php echo $status->status_text; ?>
      </div>
      <?php if($status->id == 1) { ?>
        <button class="disabled">  
          X
        </button>
      <?php } else { ?>
      <button onclick="deleteStatus(<?php echo $status->id; ?>)">
        X
      </button>
      <?php } ?>
    </div>
  <?php } ?>
  </div>
<?php } ?>

<?php function listAllSubjects(PDO $db){ ?>
  <div class="year-container">
    <?php for($i=1; $i<=3; $i++){ ?>
    <h2 class="year-title" id="year-<?php echo $i; ?>">Year <?php echo $i; ?></h2>
    <div class="subject-container">
      <?php
      $subjects = Subject::getSubjectsByYear($db,$i);
      foreach($subjects as $subject){ ?>
      <div class="subject" id="subject-<?php echo $subject->id; ?>">
        <div class="code">
        <?php echo $subject->code; ?>
        </div>
        <div class="subject-name">
          <?php echo $subject->subject_name; ?>
        </div>
        <div class="full-name">
          <?php echo $subject->full_name; ?>
        </div>
        <button onclick="deleteSubject(<?php echo $subject->id; ?>)">
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
      <input type="text" name="status-text" placeholder="Status Text" required>
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

<?php function listAllAgents(array $users, PDO $db){ ?>
  <div class="agent-container">
  <?php foreach($users as $user){ ?>
    <div class="agent">
      <div class="username">
        <?php echo '@' . $user->username; ?>
      </div>
      <div class="name">
        <?php echo $user->name; ?>
      </div>
      <?php 
        $agent = Agent::getAgent($db, $user->id);
      ?>
      <select class="year" name="year" onchange="getSubjects(this.value)">
        <option value="" disabled selected>Select year</option>
        <option value="1">1st year</option>
        <option value="2">2nd year</option>
        <option value="3">3rd year</option>
      </select>
      <div class="subjectContainer"></div>
      <!--<select class="role-select" onchange="updateAgentSubject(<?php echo $agent->subject; ?>, this.value)">
      </select> -->
    </div>
  <?php } ?>
  </div>
<?php } ?>