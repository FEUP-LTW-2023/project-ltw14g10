<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../utils/session.php');
  require_once(__DIR__ . '/../database/user.class.php');
?>

<?php function setHeaderChangeProfile() { ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>help.eic Profile</title>
    <link rel="stylesheet" href="../css/change-profile-style.css" />
    <link rel="stylesheet" href="../css/common-style.css"/>
</head>

<?php } ?>

<?php function drawEditProfileForm(User $user){ ?>
  <div id="title">
    Edit Profile
  </div>
  <form action="../actions/action_edit_profile.php" method="post" enctype="multipart/form-data" class="center-form">
    <div class="flex">
      <div class="input-box general-section">
        <div class="sub-title">General</div>
        <div class="form-wrapper">
          <div class="prefix">Username:</div>
          <input type="text" name="update_username" value="<?php echo $user->username; ?>" class="box">
        </div>
        <div class="form-wrapper">
          <div class="prefix">Email:</div>
          <input type="email" name="update_email" value="<?php echo $user->email; ?>" class="box">
        </div>
        <div class="form-wrapper">
          <div class="prefix">Name:</div>
          <input type="text" name="update_name" value="<?php echo $user->name; ?>" class="box">
        </div>
      </div>
      <div class="input-box password-section">
        <div class="sub-title">Password</div>
          <div class="form-wrapper">
            <input type="password" name="old_password" placeholder="Enter Previous Password" class="box">
          </div>
          <div class="form-wrapper">
            <input type="password" name="new_password" placeholder="Enter New Password" class="box">
          </div>
          <div class="form-wrapper">
            <input type="password" name="confirm_password" placeholder="Confirm New Password" class="box">
          </div>
      </div>
    </div>
    <input type="submit" value="Update Profile" name="update_profile" class="btn">
  </form>
<?php } ?>
