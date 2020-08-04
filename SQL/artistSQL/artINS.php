<?php
    include '../Connection.php'; //Establish database connection

    if(isset($_POST['addArtist'])){
        $newArtist = $_POST['addArtist'];
        $sql_query = "INSERT INTO Artist(artName) VALUES ('$newArtist')";
        $result = mysqli_query($conn, $sql_query);
    }

    header("Location: ../../Artists.php");
?>