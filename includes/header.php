<?php
  require "includes/config.php";
  require "includes/classes/Artist.php";
  require "includes/classes/Album.php";
  require "includes/classes/Song.php";
  // session_destroy();

if(isset($_SESSION['userLoggedIn'])) {
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
      <link rel="stylesheet" href="assets/css/fonts/fonts.css?v=1.0">
      <link href="https://fonts.googleapis.com/css?family=Patua+One|Roboto" rel="stylesheet">
      <script src="assets/js/register.js"></script>
      <script src="assets/js/script.js"></script>

      <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
    </head>
    <body>

    <script type="text/javascript">
      var audioElement = new Audio();
      audioElement.setTrack("assets/music/Vanishing/This_Road.mp3");
      // audioElement.audio.play();
    </script>

    <div id="mainContainer">

      <div id="topContainer">

        <?php require "includes/navBarContainer.php"; ?>

          <div id="mainViewContainer">
            <div id="mainContent">
