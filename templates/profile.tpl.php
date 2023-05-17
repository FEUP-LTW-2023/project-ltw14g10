<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/user.class.php');
?>

<?php function setHeaderProfile() { ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Profile</title>
    <link rel="stylesheet" href="../css/profile-style.css" />
    <link rel="stylesheet" href="../css/common-style.css"/>
</head>

<?php } ?>

<?php function drawProfileBody(User $user) { ?>
  <div class="title">Profile</div>
  <body>
    <div class = "profile-info">
      <div id="name">
        <?php echo $user->name; ?>
      </div>
      <div id="username">
        @<?php echo $user->username; ?>
      </div>
    </div>
    <div id="change-profile">
      <a href="../pages/change-profile.php">Change profile</a>
      
    </div>
  </body>
<?php } ?>