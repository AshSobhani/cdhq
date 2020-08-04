<?php
    include '../Connection.php'; //Establish database connection

    $traID = $_POST['var'];
    $delete_sql = "DELETE FROM Tracks WHERE traID = '$traID'";
    mysqli_query($conn, $delete_sql);

    header("Location: ../../Tracks.php");
?>