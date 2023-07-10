<?php 
$activePage = 'treningTrener';
require_once __SITE_PATH . '/view/_headerTrener.php'; 
?>

<div class="training-form-container">
    <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=treningTrener">
        <div class="form-group">
            <label for="vrsta">Vrsta:</label>
            <input type="text" id="vrsta" name="vrsta" />
        </div>
        <div class="form-group">
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" />
        </div>
        <div class="form-group">
            <label for="datum">Datum:</label>
            <input type="date" id="datum" name="datum" />
        </div>
        <div class="form-group">
            <label for="sportasi">Sportaši:</label>
            <?php 
                foreach( $sportasList as $sportas )
				{
					echo '<div class="checkbox-container"><label for="username[]">'.$sportas->username.'</label><input type="checkbox" name="username[]" value='.$sportas->username . '></div>';
				}
            ?>
        </div>
        <div id="intervalContainer">
            <div class="form-group interval-group">
                <label for="interval1">Interval 1:</label>
                <input type="text" id="interval1" name="interval1" />
            </div>
        </div>
		<div class="form-group">
			<button type="button" id="addInterval" class="interval-button">Dodaj Interval</button>
			<button type="button" id="removeInterval" class="interval-button">Ukloni Interval</button>
		</div>
		<div class="form-group">
			<button type="submit" class="submit-button">Dodaj trening!</button>
		</div>

    </form>
</div>

<script src="view/novitreningTrener.js"></script>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
