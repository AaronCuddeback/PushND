<?php require ("includes/header.php");

  if(isset($_GET['id'])) {
    $albumID = $_GET['id'];
  } else {
    header("Location: index.php");
  }

  $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumID'");
  $album = mysqli_fetch_array($albumQuery);

  echo $album['title'];

?>





<?php require ("includes/footer.php"); ?>
