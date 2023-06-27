<?php require_once __SITE_PATH . '/view/_header_pocetni.php'; ?>

<form method="post" action="<?php echo __SITE_URL . '/index.php?rt=loginTrener'?>">
	Korisničko ime:
	<input type="text" name="username" />
	<br />
	Lozinka:
	<input type="password" name="password" />
	<br />
	<button type="submit">Ulogiraj se kao trener!</button>
</form>






<?php require_once __SITE_PATH . '/view/_footer.php'; ?>