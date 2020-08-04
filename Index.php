<!DOCTYPE html>

<html class="Index">
    <head>
        <title>CDHQ</title>
        <?php include 'Structure/Head.php'; //Misc Head Links ?>
        <?php include 'SQL/Connection.php'; //Establish database connection ?>
    </head>

    <body>
        <?php $countArtists = "SELECT COUNT(*) AS 'artistCount' FROM Artist";
        $queryArtists = mysqli_query($conn, $countArtists);
        $artist = mysqli_fetch_assoc($queryArtists);

        $countCDs = "SELECT COUNT(*) AS 'cdCount' FROM CD";
        $queryCDs = mysqli_query($conn, $countCDs);
        $cds = mysqli_fetch_assoc($queryCDs);

        $countTracks = "SELECT COUNT(*) AS 'tracksCount' FROM Tracks";
        $queryTracks = mysqli_query($conn, $countTracks);
        $tracks = mysqli_fetch_assoc($queryTracks);?>
        
        <div class = "indexPush">
        </div>

        <div class = "indexContent">
        <p class = 'stats'>No. ARTISTS: <?php echo $artist['artistCount'];?></p>
        <p class = 'stats'>No. CD'S: <?php echo $cds['cdCount'];?></p>
        <p class = 'stats'>No. TRACKS: <?php echo $tracks['tracksCount'];?></p>
        </div>
        <div class = "indexContent">
            <a href="Artists.php" class='mainText'>ARTISTS</a>
        </div>
        <div class = "indexContent">
            <a href="CDs.php" class='mainText'>CD'S</a>
        </div>
        <div class = "indexContent">
            <a href="Tracks.php" class='mainText'>TRACKS</a>
        </div>
    </body>
</html>