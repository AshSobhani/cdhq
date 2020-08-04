<?php
    include '../Connection.php'; //Establish database connection

    $newCDId = $_POST['editCDId'];
    // Split Array By Spaces (For Correct ID)
    $newCDId = explode(' ',trim($newCDId));
    $newTraTitle = $_POST['editTraTitle'];
    $newTraDuration = $_POST['editTraDuration'];

    $traID = $_POST['old'];
    $update_sql = "UPDATE Tracks SET cdID = '$newCDId[0]', TraTitle = '$newTraTitle', TraDur = '$newTraDuration' WHERE traID = '$traID'";

    mysqli_query($conn, $update_sql);

    header("Location: ../../Tracks.php");
?>