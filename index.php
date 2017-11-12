  <?php require "includes/header.php" ?>

  <h1 class="pageHeadingBig">Featured</h1>

  <div class="gridViewContainer">

    <?php
      $albumQuery = mysqli_query($con, "SELECT * FROM albums");
    while($row = mysqli_fetch_array($albumQuery)) {
        echo $row['title'] . "<br />";
    }
        ?>

  </div>


    <?php require "includes/footer.php" ?>
