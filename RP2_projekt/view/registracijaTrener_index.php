<?php require_once __SITE_PATH . '/view/_header_pocetni.php'; ?>

<form method="post" action="<?php echo __SITE_URL . '/index.php?rt=registracijaTrener'?>">
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
		<option value="1">Jadran Zadar</option>
		<option value="2">Gusar</option>
		<option value="3">Mornar</option>
		<option value="4">Mladost</option>
    </select>
	<br />
	<button type="submit">Stvori korisnički račun!</button>
	
</form>

<p>
	Povratak na <a href="<?php echo __SITE_URL . '/index.php?rt=loginTrener'?>">login</a>.
</p>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>