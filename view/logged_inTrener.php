<?php 
$activePage = 'loginTrener';
require_once __SITE_PATH . '/view/_headerTrener.php'; ?>

<div class="notification">
	<p>Bravo <?php echo $_SESSION['username']; ?>!</p>
	<br>
	<p>Uspješno ste se ulogirali!</p>
</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>