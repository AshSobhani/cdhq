<?php
    include '../Connection.php'; //Establish database connection

    if(isset($_POST['addTraTitle'])){
        $newCDId = $_POST['addCDId'];
        // Split Array By Spaces (For Correct ID)
        $newCDId = explode(' ',trim($newCDId));
        $newTraTitle = $_POST['addTraTitle'];
        $newTraDuration = $_POST['addTraDuration'];

        $sql_query = "INSERT INTO Tracks(cdID, TraTitle, TraDur) VALUES ('$newCDId[0]', '$newTraTitle','$newTraDuration')";
        $result = mysqli_query($conn, $sql_query);
    }

    header("Location: ../../Tracks.php");
?>