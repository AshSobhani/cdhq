<?php
    include '../Connection.php'; //Establish database connection

    $newArtId = $_POST['editArtId'];
    // Split Array By Spaces (For Correct ID)
    $newArtId = explode(' ',trim($newArtId));
    $newCDTitle = $_POST['editCDTitle'];
    $newCDPrice = $_POST['editCDPrice'];
    $newCDGenre = $_POST['editCDGenre'];

    $cdID = $_POST['old'];
    $update_sql = "UPDATE CD SET artID = '$newArtId[0]', cdTitle = '$newCDTitle', cdPrice = '$newCDPrice', cdGenre = '$newCDGenre' WHERE cdID = '$cdID'";

    mysqli_query($conn, $update_sql);

    header("Location: ../../CDs.php");
?>