<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BugBlitz Login</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <h1><a href="index.php">BugBlitz</a></h1>
  </header>
  <p class="sign-in">Log in</p>
  <form action="login.php" method="post">
    <input type="text" name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" value="Sign in" />
  </form>
  <p class="sign-up">
    <a href="signup.html">Don't have an account? Sign up</a>
  </p>
  <p class="forgot-password">
    <a href="forgot-password.html">Forgot your password? Reset it</a>
  </p>
  <p class="forgot-password">
    <a href="forgot-username.html">Forgot your username? Reset it</a>
  </p>
</body>

</html>