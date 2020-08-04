<!DOCTYPE html>

<html class="CDs">
    <head>
        <title>CDs | CDHQ</title>
        <?php include 'Structure/Head.php'; //Misc Head Links ?>
        <?php include 'SQL/Connection.php'; //Establish database connection ?>
    </head>

    <body>
        <?php include 'Structure/Nav.php'; //Establish database connection & link CSS
        
        $queryA = "SELECT * FROM Artist ORDER BY artID";
        $resultA = mysqli_query($conn, $queryA);
        $queryC = "SELECT DISTINCT cdGenre FROM CD ORDER BY cdGenre";
        $resultC = mysqli_query($conn, $queryC);
        
        $oldCDTitle = $_POST['old'];
        $cdID = $_POST['ID'];?>

        <div class = "editRec">
            <h1>Edit CD - <?php echo $oldCDTitle?></h1>
            <form name="editCD" method="post" action="SQL/cdSQL/cdEdit.php">
                <select name='editArtId' type="text">
                    <?php while($rowA = mysqli_fetch_array($resultA)):;?>
                    <option><?php echo $rowA['artID'];?> - <?php echo $rowA['artName'];?></option>
                    <?php endwhile;?>
                </select>
                <input name='editCDTitle' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Update Title"/>
                <input name='editCDPrice' type="number" step='0.01' size= "40" pattern=".{1,}" required title="" maxlength="20" min ="0.01" placeholder = "Update Price"/>
                <input name='editCDGenre' list='genres' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Add Genre Or Select" autocomplete="false"/>
                    <datalist id ='genres' name='editCDGenre' type="text" autocomplete="false">
                        <?php while($rowC = mysqli_fetch_array($resultC)):;?>
                        <option><?php echo $rowC['cdGenre'];?></option>
                        <?php endwhile;?>
                    </datalist>
                <input type="submit" name="newName" value="Apply"/>
                <input type="hidden" name="old" value="<?php echo $cdID?>"/>
            </form>
        </div>
    </body>
</html>