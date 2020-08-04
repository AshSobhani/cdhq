<!DOCTYPE html>

<html class="Artists">
    <head>
        <title>Artists | CDHQ</title>
        <?php include 'Structure/Head.php'; //Misc Head Links ?>
        <?php include 'SQL/Connection.php'; //Establish database connection ?>
    </head>

    <body>
        <?php include 'Structure/Nav.php'; //Establish database connection & link CSS ?>

        <?php $oldArtName = $_POST['old'];?>
        <?php $artID = $_POST['ID'];?>

        <div class = "editRec">
            <h1>Edit Artist - <?php echo $oldArtName?></h1>
            <form name="editArtist" method="post" action="SQL/artistSQL/artEdit.php">
                <input name='editArtist' type="text" size= "40" pattern=".{1,}" required title="" maxlength="20" placeholder = "Update Name"/>
                <input type="submit" name="newName" value="Apply"/>
                <input type="hidden" name="old" value="<?php echo $artID?>"/>
            </form>
        </div>
    </body>
</html>