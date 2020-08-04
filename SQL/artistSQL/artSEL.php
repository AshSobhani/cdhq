<?php
    if(isset($_GET['search'])){
        $search_sql = "SELECT * FROM Artist WHERE artName LIKE '%".$_GET['search']."%' ORDER BY artName";
        $search_query = mysqli_query($conn, $search_sql);
        if(mysqli_num_rows($search_query) != 0){
            $search_rs = mysqli_fetch_assoc($search_query);
        }

        if(mysqli_num_rows($search_query) != 0){
            do{ 
                $name = $search_rs['artName'];
                $ID = $search_rs['artID'];
                
                $countCD = "SELECT COUNT(*) AS 'cdCount' FROM CD WHERE artID LIKE '$ID'";
                $queryCD = mysqli_query($conn, $countCD);
                $cdCount = mysqli_fetch_assoc($queryCD);

                $countTracks = "SELECT COUNT(*) AS 'tracksCount' FROM Tracks WHERE cdID IN (SELECT cdID FROM cd WHERE artID = '$ID')";
                $queryTracks = mysqli_query($conn, $countTracks);
                $tracksCount = mysqli_fetch_assoc($queryTracks);?>

                <div class = "Content">
                    <!-- Print searched name in content box -->
                    <p class="main"><a href="CDs.php?search=<?php echo $name;?>"><?php echo $name;?></a></p>
                    <p class="extra">CD's: <?php echo $cdCount['cdCount'];?> • Tracks: <?php echo $tracksCount['tracksCount'];?></p>

                    <!-- Delete Button -->
                    <form class="delBtn" method="post" action="SQL/artistSQL/artDEL.php">
                        <button class="editDelBtn" type="submit" onclick="return confirm('Are you sure you want to delete this Artist?\n(It may effect other records due to cascade delete)')">☒</button>
                        <input type='hidden' name='var' value="<?php echo $ID?>"/>
                    </form>
                    
                    <!-- Edit Button -->
                    <form class="delBtn" method="post" action="editArt.php">
                        <button class="editDelBtn" type="submit">✎</button>
                        <input type='hidden' name="old" value="<?php echo $name?>"/>
                        <input type='hidden' name="ID" value="<?php echo $ID?>"/>
                    </form>
                </div>
                <?php
            } while($search_rs = mysqli_fetch_assoc($search_query));
        }
        else{ ?>
        <div class = "Content">
            <p class = 'NRF'><?php echo "No Existing Artists...";?></p>
        </div>
        <?php }
    }
    
    else{
        header("Location: Artists.php?search=");
    } ?>

    <script src = "JS/main.js"></script>