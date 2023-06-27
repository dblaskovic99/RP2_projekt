<?php
$activePage = 'loginTrener';
require_once __SITE_PATH . '/view/_header_pocetni.php'; ?>

<section class="login-section">
	<div class="login-container">
		<h1>Ulogirajte se kao trener</h1>
		<form method="post" action="<?php echo __SITE_URL . '/index.php?rt=loginTrener'?>">
			<div class="form-group">
				<label for="username">Korisničko ime:</label>
				<input type="text" id="username" name="username" />
			</div>
			<div class="form-group">
				<label for="password">Lozinka:</label>
				<input type="password" id="password" name="password" />
			</div>
			<button type="submit" class="submit-button">Ulogiraj se!</button>
		</form>
	</div>
</section>




<?php require_once __SITE_PATH . '/view/_footer.php'; ?>