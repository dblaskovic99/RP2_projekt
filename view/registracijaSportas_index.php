<?php 
$activePage = 'registracijaSportas';
require_once __SITE_PATH . '/view/_header_pocetni.php'; 
?>

<div class="registration-container">
<form class="registration-form" method="post" action="<?php echo __SITE_URL . '/index.php?rt=registracijaSportasa'?>">
		Odaberite korisnièko ime:
		<input type="text" name="username" />
		<br />
		Odaberite lozinku:
		<input type="password" name="password" />
		<br />
		Unesite ime:
		<input type="text" name="ime" />
		<br />
		Unesite prezime:
		<input type="text" name="prezime" />
		<br />
		Datum roðenja:
		<input type="date" name="datum" />
		<br />
		Kategorija:
		<select name="kategorija" id="kategorija">
			<option value="1">Kadet</option>
			<option value="2">Junior</option>
			<option value="3">Senior</option>
			<option value="4">Veteran</option>
		</select>
		Klub:
		<select name="id_klub" id="id_klub">
			<?php foreach ($kluboviList as $klub) {
				echo '<option value="' . $klub['id_klub'] . '">' . $klub['ime_kluba'] . '</option>';
			} ?>
		</select>

		<br />
		<button type="submit">Stvori korisnièki raèun!</button>	
	</form>
	
</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>