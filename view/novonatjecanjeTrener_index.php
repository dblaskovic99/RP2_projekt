<?php 
$activePage = 'natjecanjeTrener';
require_once __SITE_PATH . '/view/_headerTrener.php'; 
?>

<div class="training-form-container">
    <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=natjecanjeTrener">
        
        <div class="form-group">
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" />
        </div>
        <div class="form-group">
            <label for="datum">Datum:</label>
            <input type="date" id="datum" name="datum" />
        </div>
        <div class="form-group">
            <label for="lokacija">Lokacija:</label>
            <input type="lokacija" id="lokacija" name="datum" />
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
            <div class="form-group">
                <label for="disciplina">Disciplina:</label>
                <input type="text" id="disciplina" name="disciplina" />
            </div>
        </div>
		
		<div class="form-group">
			<button type="submit" class="submit-button">Dodaj natjecanje!</button>
		</div>

    </form>
</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
