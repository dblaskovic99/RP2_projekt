<?php require_once __SITE_PATH . '/view/_header.php'; ?>


	<h2>Popis svih korisnika:</h2>
	<table>
		<tr><th>Username</th><th>Ime</th><th>Prezime</th><th>Datum rođenja</th><th>Kategorija</th><th>Klub</th></tr>
		<?php 
			foreach( $sportasList as $sportas )
			{
				echo '<tr>' .
                     '<td>' . $sportas->username . '</td>' .
				     '<td>' . $sportas->ime . '</td>' .
				     '<td>' . $sportas->prezime . '</td>' .
                     '<td>' . $sportas->datum_rodenja . '</td>' .
				     '<td>' . $sportas->kategorija . '</td>' .
				     '<td>' . $sportas->id_kluba . '</td>' .
				     '</tr>';
			}
		?>
	</table>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
