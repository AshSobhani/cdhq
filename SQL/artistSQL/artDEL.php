<?php
    include '../Connection.php'; //Establish database connection

    $artID = $_POST['var'];
    $delete_sql = "DELETE FROM Artist WHERE artID = '$artID'";
    mysqli_query($conn, $delete_sql);

    header("Location: ../../Artists.php");
?>