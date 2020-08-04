<!DOCTYPE html>

<html class="Artists">
    <head>
        <title>Artists | CDHQ</title>
        <?php include 'Structure/Head.php'; //Misc Head Links ?>
        <?php include 'SQL/Connection.php'; //Establish database connection ?>
    </head>

    <body>
        <?php include 'Structure/Nav.php'; //Establish database connection & link CSS ?>
        <div class="searchBar">
            <form name="SearchBar" method="get" action="Artists.php">
                <input name='search' type="text" size= "40" maxlength="30" placeholder = "Search For Artists..."/>
                <input type="submit" name="submit" value="Go"/>
            </form>
        </div>

        <?php include 'SQL/artistSQL/artSEL.php'; //include the table ?>

        <div class = "Content"/>
            <button id="modalBtn" class="openButton" type="button">+</button>
        </div>

        <div id="simpleModal" class="modalFrame">
            <div class="modalBox">
                <span class="closeBtn">&times;</span>
                <p>Add New Artist</p>
                <div class="addNewBox">
                    <form name="addArtist" method="post" action="SQL/artistSQL/artIns.php">
                        <input name='addArtist' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Artist Name"/>
                        <input type="submit" name="submitArt" value="Add"/>
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