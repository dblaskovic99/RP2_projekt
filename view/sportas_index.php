<?php require_once __SITE_PATH . '/view/_header.php'; ?>


	<h2>Podaci o korisniku:</h2>
	<div class="user-info">
		
		<ul>
			<li>username: <?php echo $sportas->username; ?></li>
			<li>ime: <?php echo $sportas->ime; ?></li>
			<li>prezime: <?php echo $sportas->prezime; ?></li>
			<li>datum rođenja: <?php echo $sportas->datum_rodenja; ?></li>
			<li>kategorija: <?php echo $sportas->kategorija; ?></li>
			
		</ul>
	</div>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
