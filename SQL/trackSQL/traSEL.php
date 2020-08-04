<?php
    if(isset($_GET['search'])){
        $search_sql = "SELECT * FROM Tracks, CD, Artist WHERE (Tracks.cdID = CD.cdID AND CD.artID = Artist.artID) AND (traTitle LIKE '%".$_GET['search']."%' OR cdTitle LIKE '%".$_GET['search']."%' OR artName LIKE '%".$_GET['search']."%') ORDER BY traTitle";
        $search_query = mysqli_query($conn, $search_sql);
        if(mysqli_num_rows($search_query) != 0){
            $search_rs = mysqli_fetch_assoc($search_query);
        }

        if(mysqli_num_rows($search_query) != 0){
            do{
                $title = $search_rs['traTitle'];
                $ID = $search_rs['traID'];
                
                $sqlTra = "SELECT * FROM CD WHERE cdID IN (SELECT cdID FROM Tracks WHERE traID = '$ID')";
                $queryTra = mysqli_query($conn, $sqlTra);
                $cd = mysqli_fetch_assoc($queryTra);
                $cdID = $cd['cdID'];

                $sqlA = "SELECT * FROM Artist WHERE artID IN (SELECT artID FROM CD WHERE cdID = '$cdID')";
                $queryA = mysqli_query($conn, $sqlA);
                $art = mysqli_fetch_assoc($queryA);?>

                <div class = "Content">
                    <!-- Print searched name in content box -->
                    <p class="main"><?php echo $title;?></p>
                    <p class ="extra"><?php echo $search_rs['traDur']?> • <a href="Tracks.php?search=<?php echo $cd['cdTitle']?>"><?php echo $cd['cdTitle']?></a> • <a href="Tracks.php?search=<?php echo $art['artName']?>"><?php echo $art['artName']?></a></p>
                    <!-- Delete Button -->
                    <form class="delBtn" method="post" action="SQL/trackSQL/traDEL.php">
                        <button class="editDelBtn" type="submit" onclick="return confirm('Are you sure you want to delete this Track?\n(It may effect other records due to cascade delete)')">☒</button>
                        <input type='hidden' name='var' value="<?php echo $ID?>"/>
                    </form>
                    
                    <!-- Edit Button -->
                    <form class="delBtn" method="post" action="editTra.php">
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
            <p class = 'NRF'><?php echo "No Existing Tracks...";?></p>
        </div>
        <?php }
    }
    
    else{
        header("Location: Tracks.php?search=");
    } ?>

    <script src = "JS/main.js"></script>


