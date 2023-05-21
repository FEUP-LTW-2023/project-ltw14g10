<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/user.class.php');
?>

<?php function setHeaderProfile()
{ ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Profile</title>
    <link rel="stylesheet" href="../css/profile-style.css" />
    <link rel="stylesheet" href="../css/common-style.css" />
  </head>

<?php } ?>

<?php function drawProfileBody(User $user)
{ ?>
  <div class="profile-container">
    
    <div class="title">Profile</div>
    <img src="../assets/user_icon.png" class="profile-icon">
    <div class="profile-info">
      <div class="name">
        <?php echo $user->name; ?>
      </div>
      <div class="username">
        @<?php echo $user->username; ?>
      </div>
      <div class="email">
        email:
        <?php echo $user->email; ?>
      </div>

    </div>
    <div class="profile-actions">
      <a href="../pages/change-profile.php" class="change-profile-btn">Change profile</a>
      <form action="../actions/action_logout.php" method="post" class="logout-form">
        <button type="submit">Logout</button>
      </form>
    </div>
  </div>

<?php } ?>