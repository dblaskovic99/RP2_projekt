<?php require_once __SITE_PATH . '/view/_headerTrener.php'; ?>


	<h2>Podaci o korisniku:</h2>
	<div class="sportas-info">
		
		<ul>
			<li>username: <?php echo $sportas->username; ?></li>
			<li>ime: <?php echo $sportas->ime; ?></li>
			<li>prezime: <?php echo $sportas->prezime; ?></li>
			<li>datum rođenja: <?php echo $sportas->datum_rodenja; ?></li>
			<li>kategorija: <?php echo $sportas->kategorija; ?></li>
			
		</ul>
	</div>
		
	<div class="trening-info">
	<table>
			<tr><th>Vrsta</th><th>Ime</th><th> 1 </th><th>Rezultat 1</th><th> 2</th><th>Rezultat 2</th><th> 3</th><th>Rezultat 3</th><th> 4</th><th>Rezultat 4</th><th> 5</th><th>Rezultat 5</th><th> 6</th><th>Rezultat 6</th><th> 7</th><th>Rezultat 7</th><th> 8</th><th>Rezultat 8</th><th> 9</th><th>Rezultat 9</th><th> 10</th><th>Rezultat 10</th>
			<?php 
				foreach( $treningList as $trening )
				{
					echo '<tr>' .
						'<td>' . $trening->vrsta . '</td>' .
						'<td>' . $trening->ime . '</td>' .
						'<td>' . $trening->interval1 . '</td>' .
						'<td>' . $trening->rez_interval1 . '</td>' .
						'<td>' . $trening->intreval2 . '</td>' .
						'<td>' . $trening->rez_interval2 . '</td>' .
						'<td>' . $trening->intreval3 . '</td>' .
						'<td>' . $trening->rez_interval3 . '</td>' .
						'<td>' . $trening->intreval4 . '</td>' .
						'<td>' . $trening->rez_interval4 . '</td>' .
						'<td>' . $trening->intreval5 . '</td>' .
						'<td>' . $trening->rez_interval5 . '</td>' .
						'<td>' . $trening->intreval6 . '</td>' .
						'<td>' . $trening->rez_interval6 . '</td>' .
						'<td>' . $trening->intreval7 . '</td>' .
						'<td>' . $trening->rez_interval7 . '</td>' .
						'<td>' . $trening->intreval8 . '</td>' .
						'<td>' . $trening->rez_interval8 . '</td>' .
						'<td>' . $trening->interval9 . '</td>' .
						'<td>' . $trening->rez_interval9 . '</td>' .
						'<td>' . $trening->intreval10 . '</td>' .
						'<td>' . $trening->rez_interval10 . '</td>' .
						
						'</tr>';
				}
			?>
		</table>
	</div>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
