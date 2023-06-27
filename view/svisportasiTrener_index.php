<?php require_once __SITE_PATH . '/view/_headerTrener.php'; ?>

<div class="athlete-list">
	<h2>Popis Vaših sportaša:</h2>
	<table>
		<tr><th>Username</th><th>Ime</th><th>Prezime</th><th>Datum rođenja</th><th>Kategorija</th><th>Klub</th></tr>
		<?php 
			foreach( $sportasList as $sportas )
			{
				echo '<tr>' .
					 '<td> <a href="' . __SITE_URL .'/index.php?rt=sportasTrener&username=' . $sportas->username . '">' . $sportas->username . '</td>' .
					 '<td>' . $sportas->ime . '</td>' .
					 '<td>' . $sportas->prezime . '</td>' .
					 '<td>' . $sportas->datum_rodenja . '</td>' .
					 '<td>' . $sportas->kategorija . '</td>' .
					 '<td>' . $sportas->id_kluba . '</td>' .
					 '</tr>';
			}
		?>
	</table>
</div>

<?php require_once __SITE_PATH . '/view/_footer.php'; ?>