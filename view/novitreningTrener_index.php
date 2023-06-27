
<?php require_once __SITE_PATH . '/view/_headerTrener.php'; ?>


<form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=treningTrener">
	Vrsta:
	<input type="text" name="vrsta" />
	<br />
	Ime:
	<input type="text" name="ime" />
	<br />
	Sportaši:
	<?php 
			foreach( $sportasList as $sportas )
			{
				echo '<input type="checkbox" name="username[]" value='.$sportas->username . '>' . $sportas->username;

			}
		?>
	<br>

	Interval 1:
	<input type="text" name="interval1" />
	<br />
	Interval 2:
	<input type="text" name="interval2" />
	<br />
	Interval 3:
	<input type="text" name="interval3" />
	<br />
	Interval 4:
	<input type="text" name="interval4" />
	<br />
	Interval 5:
	<input type="text" name="interval5" />
	<br />
	Interval 6:
	<input type="text" name="interval6" />
	<br />
	Interval 7:
	<input type="text" name="interval7" />
	<br />
	Interval 8:
	<input type="text" name="interval8" />
	<br />
	Interval 9:
	<input type="text" name="interval9" />
	<br />
	Interval 10:
	<input type="text" name="interval10" />
	<br />
	
	<button type="submit">Dodaj trening!</button>
</form>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>

