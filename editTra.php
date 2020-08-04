<!DOCTYPE html>

<html class="Tracks">
    <head>
        <title>Tracks | CDHQ</title>
        <?php include 'Structure/Head.php'; //Misc Head Links ?>
        <?php include 'SQL/Connection.php'; //Establish database connection ?>
    </head>

    <body>
        <?php include 'Structure/Nav.php'; //Establish database connection & link CSS
        
        $queryA = "SELECT * FROM CD ORDER BY cdID";
        $resultA = mysqli_query($conn, $queryA);
        
        $oldTraTitle = $_POST['old'];
        $traID = $_POST['ID'];?>

        <div class = "editRec">
            <h1>Edit Track - <?php echo $oldTraTitle?></h1>
            <form name="editCDId" method="post" action="SQL/trackSQL/traEdit.php">
                <select name='editCDId' type="text">
                    <?php while($rowA = mysqli_fetch_array($resultA)):;?>
                    <option><?php echo $rowA['cdID'];?> - <?php echo $rowA['cdTitle'];?></option>
                    <?php endwhile;?>
                </select>
                <input name='editTraTitle' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Update Title"/>
                <input name='editTraDuration' type="time" step="1" size= "40" pattern=".{1,}" required title="" maxlength="10" placeholder = "Update Duration (e.g 00:03:45)"/>
                <input type="submit" name="newName" value="Apply"/>
                <input type="hidden" name="old" value="<?php echo $traID?>"/>
            </form>
        </div>
    </body>
</html>