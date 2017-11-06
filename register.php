<?php
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

        $account = new Account();

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

 ?>

    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>PushND Register</title>
      <meta name="description" content="New Web Site">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/styles.css?v=1.0">
      <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
    </head>
    <body>
        <div id="inputContainer">
            <form id="loginForm" action="register.php" method="post">
                <h2>Login to your account</h2>
                <p>
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. BartSimpson" required>
                </p>
                <p>
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" type="password" name="loginPassword" placeholder="Your password" required>
                </p>
                <button type="submit" name="loginButton">LOGIN</button>
            </form>


            <form id="registerForm" action="register.php" method="post">
                <h2>Create your free account</h2>
                <p>
                    <?php echo $account->getError(Constants::$userNameLength); ?>
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" placeholder="e.g. BartSimpson" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$firstNameLength); ?>
                    <label for="firstName">First Name</label>
                    <input id="firstName" type="text" name="firstName" placeholder="e.g. Bart" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$lastNameLength); ?>
                    <label for="lastName">Last Name</label>
                    <input id="lastName" type="text" name="lastName" placeholder="e.g. Simpson" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$emailsInvalid); ?>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="e.g. bart@gmail.com" required>
                </p>
                <p>
                    <label for="confirmEmail">Confirm Email</label>
                    <input id="confirmEmail" type="email" name="confirmEmail" placeholder="Type email again" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                    <?php echo $account->getError(Constants::$passwordsNotAlphaNumeric); ?>
                    <?php echo $account->getError(Constants::$passwordsLength); ?>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Your password" required>
                </p>
                <p>
                    <label for="confirmPassword">Confirm Password</label>
                    <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Type password again" required>
                </p>
                <button type="submit" name="registerButton">SIGN UP</button>
            </form>

        </div>


    <!-- run javascript at the end -->
      <script src="js/scripts.js"></script>
    </body>
    </html>
