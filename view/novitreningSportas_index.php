
<?php 
$activePage = 'treningSportas';
require_once __SITE_PATH . '/view/_headerSportas.php'; ?>


<form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=napraviTreningSportas">
	<?php 
        echo 'Vrsta:';
        echo $treningList[0][3];
        echo '<br>';

        echo 'Ime:';
        echo $treningList[0][4];
        echo '<br>';

        echo $treningList[0][6];
        echo '<input type="text" name="rez_interval1" />';
        echo '<br>';

        if($treningList[0][8]!==""){
            echo $treningList[0][8];
            echo '<input type="text" name="rez_interval2" />';
            echo '<br>';
        }

        if($treningList[0][10]!==""){
            echo $treningList[0][10];
            echo '<input type="text" name="rez_interval3" />';
            echo '<br>';
        }

        if($treningList[0][12]!==""){
            echo $treningList[0][12];
            echo '<input type="text" name="rez_interval4" />';
            echo '<br>';
        }

        if($treningList[0][14]!==""){
            echo $treningList[0][14];
            echo '<input type="text" name="rez_interval5" />';
            echo '<br>';
        }

        if($treningList[0][16]!==""){
            echo $treningList[0][16];
            echo '<input type="text" name="rez_interval6" />';
            echo '<br>';
        }

        if($treningList[0][18]!==""){
            echo $treningList[0][18];
            echo '<input type="text" name="rez_interval7" />';
            echo '<br>';
        }

        if($treningList[0][20]!==""){
            echo $treningList[0][20];
            echo '<input type="text" name="rez_interval8" />';
            echo '<br>';
        }

        if($treningList[0][22]!==""){
            echo $treningList[0][22];
            echo '<input type="text" name="rez_interval9" />';
            echo '<br>';
        }

        if($treningList[0][24]!==""){
            echo $treningList[0][24];
            echo '<input type="text" name="rez_interval10" />';
            echo '<br>';
        }

    ?>
	<button type="submit">Dodaj trening!</button>
</form>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>

