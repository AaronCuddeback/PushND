<?php
  $songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");
  $resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);
?>

<script>

  $(document).ready(function() {
    currentPlaylist = <?php echo $jsonArray; ?>;
    audioElement = new Audio();
    setTrack(currentPlaylist[0], currentPlaylist, false);
    updateVolumeProgressBar(audioElement.audio);

    $("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e){
      e.preventDefault();
    });


    $(".playbackBar .progressBar").mousedown(function() {
      mouseDown = true;
    });

    $(".playbackBar .progressBar").mousemove(function(e) {
      if(mouseDown == true) {
        //set time of song depending on position of mousedown
        timeFromOffset(e, this);
      }
    });

    $(".playbackBar .progressBar").mouseup(function(e) {
      timeFromOffset(e, this);
    });


    $(".volumeBar .progressBar").mousedown(function() {
      mouseDown = true;
    });

    $(".volumeBar .progressBar").mousemove(function(e) {
      if(mouseDown == true) {
          var percentage = e.offsetX / $(this).width();
          audioElement.audio.volume = percentage;
        }
      });

    $(".volumeBar .progressBar").mouseup(function(e) {
      var percentage = e.offsetX / $(this).width();
      audioElement.audio.volume = percentage;
    });


    $(document).mouseup(function() {
      mouseDown = false;
    });

  });

    function timeFromOffset(mouse, progressBar){
      var percentage = mouse.offsetX / $(progressBar).width() * 100;
      var seconds = audioElement.audio.duration * (percentage / 100);
      audioElement.setTime(seconds);
    }




  function setTrack(trackID, newPlaylist, play) {
      $.post("includes/handlers/ajax/getSongJson.php", { songID: trackID }, function(data) {
        var track = JSON.parse(data);
        $(".trackName span").text(track.title);

        $.post("includes/handlers/ajax/getArtistJson.php", { artistID: track.artist }, function(data) {
           var artist = JSON.parse(data);
          $(".artistName span").text(artist.name);
        });

        $.post("includes/handlers/ajax/getAlbumJson.php", { albumID: track.album }, function(data) {
          var album = JSON.parse(data);
          $(".albumLink img").attr("src", album.artworkPath);
        });

        audioElement.setTrack(track);
        playSong();
      });

      if(play == true) {
        audioElement.play();
      }
  }

  function playSong() {

    if(audioElement.audio.currentTime == 0) {
      $.post("includes/handlers/ajax/updatePlays.php", { songID: audioElement.currentlyPlaying.id });
    }

    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
  }

  function pauseSong() {
    $(".controlButton.play").show();
    $(".controlButton.pause").hide();
    audioElement.pause();
  }

</script>


<div id="nowPlayingBarContainer">
  <div id="nowPlayingBar">
    <div id="nowPlayingLeft">
      <div class="content">
        <span class="albumLink">
          <img class="albumArtwork" src="" alt="Locked And Loaded Album Cover">
        </span>
        <div class="trackInfo">

          <span class="trackName">
            <span></span>
          </span>

          <span class="artistName">
            <span></span>
          </span>

        </div>
      </div>
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

            <button type="button" name="playButton" class="controlButton play" title="Play Button" onclick="playSong()">
              <img src="assets/images/icons/playbutton.svg" alt="Play">
            </button>

            <button type="button" name="pauseButton" class="controlButton pause" title="Pause Button" style="display: none;" onclick="pauseSong()">
              <img src="assets/images/icons/pause.png" alt="Pause">
            </button>

            <button type="button" name="nextButton" class="controlButton next" title="Next Button">
              <img src="assets/images/icons/next.png" alt="Next">
            </button>

            <button type="button" name="repeatButton" class="controlButton repeat" title="Repeat Button">
              <img src="assets/images/icons/repeat.png" alt="Repeat">
            </button>

        </div>

        <div class="playbackBar">

          <span class="progressTime current">0.00</span>
          <div class="progressBar">
            <div class="progressBarBg">
              <div class="progress"></div>
            </div>
          </div>
          <span class="progressTime remaining">0.00</span>

        </div>

      </div>
    </div>

    <div id="nowPlayingRight">
      <div class="volumeBar">

          <button type="button" name="volumeButton" class="controlButton volume" title="Volume Button">
            <img src="assets/images/icons/volume.png" alt="Volume">
          </button>

        <div class="progressBar">
          <div class="progressBarBg">
            <div class="progress"></div>
          </div>

      </div>
    </div>
  </div>
</div>
</div>
