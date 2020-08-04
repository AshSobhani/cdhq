<?php
    include '../Connection.php'; //Establish database connection

    $newArtName = $_POST['editArtist'];
    $artID = $_POST['old'];
    $update_sql = "UPDATE Artist SET artName = '$newArtName' WHERE artID = '$artID'";

    mysqli_query($conn, $update_sql);

    header("Location: ../../Artists.php");
?>