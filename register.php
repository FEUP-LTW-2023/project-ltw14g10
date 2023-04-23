<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BugBlitz Sign Up</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <h1><a href="index.php">BugBlitz</a></h1>
    </header>
    <p class="sign-title">Register</p>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Choose a username" required />
        <input type="text" name="email" placeholder="Enter your email address" required />
        <input type="text" name="password" placeholder="Choose a password" required />
        <input type="text" name="confirm-password" placeholder="Confirm your password" required />
        <input type="submit" value="Sign up" />
    </form>
    <p class="bottom-text">
        <a href="login.php">Already have an account? Log in</a>
    </p>
</body>

</html>