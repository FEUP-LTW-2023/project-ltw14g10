<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/user.class.php');
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

<?php function drawAllUsers(array $users){ ?>
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
    </div>
  <?php } ?>
  </div>
<?php } ?>