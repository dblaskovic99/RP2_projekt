
<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>


<form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=napraviTreningSportas">
	<?php 
        echo 'Vrsta:';
        echo $treningList[0][2];
        echo '<br>';

        echo 'Ime:';
        echo $treningList[0][3];
        echo '<br>';

        echo $treningList[0][5];
        echo '<input type="text" name="rez_interval1" />';
        echo '<br>';

        if($treningList[0][7]!==""){
            echo $treningList[0][7];
            echo '<input type="text" name="rez_interval2" />';
            echo '<br>';
        }

        if($treningList[0][9]!==""){
            echo $treningList[0][9];
            echo '<input type="text" name="rez_interval3" />';
            echo '<br>';
        }

        if($treningList[0][11]!==""){
            echo $treningList[0][11];
            echo '<input type="text" name="rez_interval4" />';
            echo '<br>';
        }

        if($treningList[0][13]!==""){
            echo $treningList[0][13];
            echo '<input type="text" name="rez_interval5" />';
            echo '<br>';
        }

        if($treningList[0][15]!==""){
            echo $treningList[0][15];
            echo '<input type="text" name="rez_interval6" />';
            echo '<br>';
        }

        if($treningList[0][17]!==""){
            echo $treningList[0][17];
            echo '<input type="text" name="rez_interval7" />';
            echo '<br>';
        }

        if($treningList[0][19]!==""){
            echo $treningList[0][19];
            echo '<input type="text" name="rez_interval8" />';
            echo '<br>';
        }

        if($treningList[0][21]!==""){
            echo $treningList[0][21];
            echo '<input type="text" name="rez_interval9" />';
            echo '<br>';
        }

        if($treningList[0][23]!==""){
            echo $treningList[0][23];
            echo '<input type="text" name="rez_interval10" />';
            echo '<br>';
        }

    ?>
	<button type="submit">Dodaj trening!</button>
</form>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>

