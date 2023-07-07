<?php require_once __DIR__ . '/_headerSportas.php'; ?>


<?php 
	foreach( $list as $obavijest )
	{
		echo '<div class="obavijest-box">' ;
        echo '<p style="color: grey; font-size: 10px;">' . $obavijest['date'] . '<p>';
        echo '<p style="font-size: 20px;">' . $obavijest['obavijest'] . '</p>' ;

		echo '</div>';
	}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>