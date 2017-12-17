<?php
  require "includes/config.php";
    include "includes/classes/User.php";
    include "includes/classes/Artist.php";
    include "includes/classes/Album.php";
    include "includes/classes/Song.php";
    include "includes/classes/Playlist.php";


if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
    $username = $userLoggedIn->getUsername();
    echo "<script>userLoggedIn = '$username';</script>";
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="assets/js/register.js"></script>
      <script src="assets/js/script.js"></script>

      <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
    </head>
    <body>

    <div id="mainContainer">

      <div id="topContainer">

        <?php require "includes/navBarContainer.php"; ?>

          <div id="mainViewContainer">
            <div id="mainContent">
