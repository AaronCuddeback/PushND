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
      <div id="nowPlayingBar">
        <div id="nowPlayingLeft">

        </div>

        <div id="nowPlayingCenter">
          <div class="content playerControls">

            <div class="buttons">
                <button type="button" name="shuffleButton" class="controlButton shuffle" title="Shuffle Button">
                  <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                </button>

                <button type="button" name="previousButton" class="controlButton previous" title="Previous Button">
                  <img src="assets/images/icons/previous.png" alt="Previous">
                </button>

                <button type="button" name="playButton" class="controlButton play" title="Play Button">
                  <img src="assets/images/icons/play.png" alt="Play">
                </button>

                <button type="button" name="pauseButton" class="controlButton pause" title="Pause Button" style="display: none;">
                  <img src="assets/images/icons/pause.png" alt="Pause">
                </button>

                <button type="button" name="nextButton" class="controlButton next" title="Next Button">
                  <img src="assets/images/icons/next.png" alt="Next">
                </button>

                <button type="button" name="repeatButton" class="controlButton repeat" title="Repeat Button">
                  <img src="assets/images/icons/repeat.png" alt="Repeat">
                </button>

            </div>

          </div>
        </div>

        <div id="nowPlayingRight">

        </div>
      </div>
    </div>

    <!-- run javascript at the end -->
      <script src="js/scripts.js"></script>
    </body>
    </html>
