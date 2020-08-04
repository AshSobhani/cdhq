<?php
    include '../Connection.php'; //Establish database connection

    if(isset($_POST['addCDTitle'])){
        $newArtId = $_POST['addArtId'];
        // Split Array By Spaces (For Correct ID)
        $newArtId = explode(' ',trim($newArtId));
        $newCDTitle = $_POST['addCDTitle'];
        $newCDPrice = $_POST['addCDPrice'];
        $newCDGenre = $_POST['addCDGenre'];

        $sql_query = "INSERT INTO CD(artID, cdTitle, cdPrice, cdGenre) VALUES ('$newArtId[0]', '$newCDTitle','$newCDPrice','$newCDGenre')";
        $result = mysqli_query($conn, $sql_query);
    }

    header("Location: ../../CDs.php");
?>