<?php 
$activePage = 'registracijaTrener';
require_once __SITE_PATH . '/view/_header_pocetni.php'; 
?>

<div class="registration-container">
<form class="registration-form" method="post" action="<?php echo __SITE_URL . '/index.php?rt=registracijaTrener'?>">
		Odaberite korisničko ime:
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
		Klub:
		<select name="id_klub" id="id_klub">
			<?php foreach ($kluboviList as $klub) {
				echo '<option value="' . $klub['id_klub'] . '">' . $klub['ime_kluba'] . '</option>';
			} ?>
		</select>

		<br />
		<button type="submit">Stvori korisnički račun!</button>	
	</form>
	
</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>