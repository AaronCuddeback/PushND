<?php
require "includes/includedFiles.php";

if(isset($_GET['id'])) {
    $artistID = $_GET['id'];
} else {
    header("Location: index.php");
}

$artist = new Artist($con, $artistID);
?>

<div class="entityInfo">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName(); ?></h1>
                <div class="headerButtons">
                    <button class="button red" type="button" name="button">PLAY</button>
                </div>
        </div>
    </div>
</div>
