<?php
    if(isset($_GET['search'])){
        $search_sql = "SELECT * FROM CD, Artist WHERE CD.artID = Artist.artID AND (cdTitle LIKE '%".$_GET['search']."%' OR cdGenre LIKE '%".$_GET['search']."%' OR Artist.artName LIKE '%".$_GET['search']."%') ORDER BY cdTitle";
        $search_query = mysqli_query($conn, $search_sql);
        if(mysqli_num_rows($search_query) != 0){
            $search_rs = mysqli_fetch_assoc($search_query);
        }

        if(mysqli_num_rows($search_query) != 0){
            do{
                $title = $search_rs['cdTitle'];
                $ID = $search_rs['cdID'];
                
                $sqlArtA = "SELECT artName FROM Artist WHERE artID IN (SELECT artID FROM CD WHERE cdID = '$ID')";
                $queryArt = mysqli_query($conn, $sqlArtA);
                $artist = mysqli_fetch_assoc($queryArt);

                $countTracks = "SELECT COUNT(*) AS 'tracksCount' FROM Tracks WHERE cdID IN (SELECT cdID FROM cd WHERE cdID = '$ID')";
                $queryTracks = mysqli_query($conn, $countTracks);
                $tracks = mysqli_fetch_assoc($queryTracks);?>

                <div class = "Content">
                    <!-- Print searched name in content box -->
                    <p class="main"><a href="Tracks.php?search=<?php echo $title;?>"><?php echo $title;?></a></p>
                    <p class ="extra">£<?php echo $search_rs['cdPrice']?> • Tracks: <?php echo $tracks['tracksCount'];?> • <a href="CDs.php?search=<?php echo $search_rs['cdGenre']?>"><?php echo $search_rs['cdGenre']?></a> • <a href="CDs.php?search=<?php echo $artist['artName']?>"><?php echo $artist['artName']?></a></p>

                    <!-- Delete Button -->
                    <form class="delBtn" method="post" action="SQL/cdSQL/cdDEL.php">
                        <button class="editDelBtn" type="submit" onclick="return confirm('Are you sure you want to delete this CD?\n(It may effect other records due to cascade delete)')">☒</button>
                        <input type='hidden' name='var' value="<?php echo $ID?>"/>
                    </form>

                    <!-- Edit Button -->
                    <form class="delBtn" method="post" action="editCD.php">
                        <button class="editDelBtn" type="submit">✎</button>
                        <input type='hidden' name="old" value="<?php echo $title?>"/>
                        <input type='hidden' name="ID" value="<?php echo $ID?>"/>
                    </form>
                </div>
                <?php
            } while($search_rs = mysqli_fetch_assoc($search_query));
        }
        else{ ?>
        <div class = "Content">
            <p class = 'NRF'><?php echo "No Existing CD's...";?></p>
        </div>
        <?php }
    }
    
    else{
        header("Location: CDs.php?search=");
    } ?>

    <script src = "JS/main.js"></script>