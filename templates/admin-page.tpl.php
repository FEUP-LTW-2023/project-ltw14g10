<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../database/admin.class.php');
  require_once(__DIR__ . '/../database/agent.class.php');
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

<?php function drawAllUsers(array $users, PDO $db){ ?>
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
          <select class="role-select">
            <option value="client" <?php echo ($mode == 2) ? 'selected' : ''; ?>>Client</option>
            <option value="agent" <?php echo ($mode == 1) ? 'selected' : ''; ?>>Agent</option>
            <option value="admin" <?php echo ($mode == 0) ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>
    </div>
  <?php } ?>
  </div>
<?php } ?>