<?php require ("includes/header.php");

  if(isset($_GET['id'])) {
    $albumID = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumID'");
  $album = mysqli_fetch_array($albumQuery);

  $artistID = $album['artist'];

  $artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id='$artistID'");
  $artist = mysqli_fetch_array($artistQuery);
  echo $artist['name'];

?>





<?php require ("includes/footer.php"); ?>
