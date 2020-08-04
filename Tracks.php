<!DOCTYPE html>

<html class="Tracks">
    <head>
        <title>Tracks | CDHQ</title>
        <?php include 'Structure/Head.php'; //Misc Head Links ?>
        <?php include 'SQL/Connection.php'; //Establish database connection ?>
    </head>

    <body>
        <?php include 'Structure/Nav.php'; //Establish database connection & link CSS ?>

        <div class="searchBar">
            <form name="SearchBar" method="get" action="Tracks.php">
                <input name='search' type="text" size= "40" maxlength="30" placeholder = "Search For Tracks..."/>
                <input type="submit" name="submit" value="Go"/>
            </form>
        </div>

        <?php 
            include 'SQL/trackSQL/traSEL.php'; //include the table 
            $queryA = "SELECT * FROM CD ORDER BY cdID";
            $resultA = mysqli_query($conn, $queryA);
        ?>
        
        <div class = "Content"/>
            <button id="modalBtn" class="openButton" type="button">+</button>
        </div>

        <div id="simpleModal" class="modalFrame">
            <div class="modalBox">
                <span class="closeBtn">&times;</span>
                <p>Add New Track</p>
                <div class="addNewBox">
                    <form name="addTrack" method="post" action="SQL/trackSQL/traINS.php">
                        <select name='addCDId' type="text">
                            <?php while($rowA = mysqli_fetch_array($resultA)):;?>
                            <option><?php echo $rowA['cdID'];?> - <?php echo $rowA['cdTitle'];?></option>
                            <?php endwhile;?>
                        </select>
                        <input name='addTraTitle' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Title"/>
                        <input name='addTraDuration' type="time" step="1" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Duration (e.g 00:03:45)"/>
                        <input type="submit" name="submitTra" value="Add"/>
                    </form>
                </div>
            </div>
        </div>

        <script src = "JS/main.js"></script>
        
        <footer>
			<p>Copyright © 2018 | CDHQ Inc. All rights reserved.</p>
		</footer>
    </body>
</html>