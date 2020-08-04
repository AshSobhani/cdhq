<?php
    include '../Connection.php'; //Establish database connection

    $cdID = $_POST['var'];
    $delete_sql = "DELETE FROM CD WHERE cdID = '$cdID'";
    mysqli_query($conn, $delete_sql);

    header("Location: ../../CDs.php");
?>