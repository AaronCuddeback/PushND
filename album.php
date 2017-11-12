<?php require ("includes/header.php");

  if(isset($_GET['id'])) {
    $albumID = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  $album = new Album($con, $albumID);

  $artist = $album->getArtist();

  echo $album->getTitle() . "<br />";
  echo $artist->getName();

?>





<?php require ("includes/footer.php"); ?>
