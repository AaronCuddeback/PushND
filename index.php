<?php
  include("includes/config.php");

  // session_destroy();

  if(isset($_SESSION['userLoggedIn'])){
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header("Location: register.php");
  }

 ?>

    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Welcome to PushND</title>
      <meta name="description" content="New Web Site">
      <meta name="author" content="">
      <link rel="stylesheet" href="assets/css/style.css?v=1.0">
      <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
    </head>
    <body>
    <h1>Welcome to PushND</h1>
    <div id="nowPlayingBarContainer">

    </div>

    <!-- run javascript at the end -->
      <script src="js/scripts.js"></script>
    </body>
    </html>
