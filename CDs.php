<!DOCTYPE html>

<html class="CDs">
    <head>
        <title>CDs | CDHQ</title>
        <?php include 'Structure/Head.php'; //Misc Head Links ?>
        <?php include 'SQL/Connection.php'; //Establish database connection ?>
    </head>

    <body>
        <?php include 'Structure/Nav.php'; //Establish database connection & link CSS ?>

        <div class="searchBar">
            <form name="SearchBar" method="get" action="CDs.php">
                <input name='search' type="text" size= "40" maxlength="30" placeholder = "Search For CDs..."/>
                <input type="submit" name="submit" value="Go"/>
            </form>
        </div>

        <?php 
            include 'SQL/cdSQL/cdSEL.php'; //include the table 
            $queryA = "SELECT * FROM Artist ORDER BY artID";
            $resultA = mysqli_query($conn, $queryA);
            $queryC = "SELECT DISTINCT cdGenre FROM CD ORDER BY cdGenre";
            $resultC = mysqli_query($conn, $queryC);
        ?>
        
        <div class = "Content"/>
            <button id="modalBtn" class="openButton" type="button">+</button>
        </div>

        <div id="simpleModal" class="modalFrame">
            <div class="modalBox">
                <span class="closeBtn">&times;</span>
                <p>Add New CD</p>
                <div class="addNewBox">
                    <form name="addCD" method="post" action="SQL/cdSQL/cdINS.php" onsubmit="return validateForm()">
                        <select name='addArtId' type="text">
                            <?php while($rowA = mysqli_fetch_array($resultA)):;?>
                            <option><?php echo $rowA['artID'];?> - <?php echo $rowA['artName'];?></option>
                            <?php endwhile;?>
                        </select>
                        <input name='addCDTitle' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Title"/>
                        <input name='addCDPrice' type="number" step='0.01' size= "40" pattern=".{1,}" maxlength="20" min ="0.01" placeholder = "Price"/>
                        <input name='addCDGenre' list='genres' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Add Genre Or Select"/>
                            <datalist id ='genres' name='addCDGenre' type="text">
                                <?php while($rowC = mysqli_fetch_array($resultC)):;?>
                                <option><?php echo $rowC['cdGenre'];?></option>
                                <?php endwhile;?>
                            </datalist>
                        <input type="submit" name="submitCD" value="Add"/>
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