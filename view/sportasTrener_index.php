<?php require_once __SITE_PATH . '/view/_headerTrener.php'; ?>

	<div class="info-container">
		
		<div class="trening-info">
			<div class="sportas-info">
				<h2>Podaci o korisniku:</h2>
				<ul>
					<li>username: <?php echo $sportas->username; ?></li>
					<li>ime: <?php echo $sportas->ime; ?></li>
					<li>prezime: <?php echo $sportas->prezime; ?></li>
					<li>datum rođenja: <?php echo $sportas->datum_rodenja; ?></li>
					<li>kategorija: <?php echo $sportas->kategorija; ?></li>
					
				</ul>
			</div>
		<h1>Zadnji odrađeni treninzi:</h1>
		<table>
				<tr><th>Vrsta</th><th>Ime</th><th> 1 </th><th>Rezultat 1</th><th> 2</th><th>Rezultat 2</th><th> 3</th><th>Rezultat 3</th><th> 4</th><th>Rezultat 4</th><th> 5</th><th>Rezultat 5</th><th> 6</th><th>Rezultat 6</th><th> 7</th><th>Rezultat 7</th><th> 8</th><th>Rezultat 8</th><th> 9</th><th>Rezultat 9</th><th> 10</th><th>Rezultat 10</th></tr>
				<?php 

					for($i=0; $i<Count($treningList); $i++){
						echo '<tr>' .
						'<td>' . $treningList[$i][2] . '</td>' .
						'<td>' . $treningList[$i][3] . '</td>' .
						'<td>' . $treningList[$i][5] . '</td>' .
						'<td>' . $treningList[$i][6] . '</td>' .
						'<td>' . $treningList[$i][7] . '</td>' .
						'<td>' . $treningList[$i][8] . '</td>' .
						'<td>' . $treningList[$i][9] . '</td>' .
						'<td>' . $treningList[$i][10] . '</td>' .
						'<td>' . $treningList[$i][11] . '</td>' .
						'<td>' . $treningList[$i][12] . '</td>' .
						'<td>' . $treningList[$i][13] . '</td>' .
						'<td>' . $treningList[$i][14] . '</td>' .
						'<td>' . $treningList[$i][15] . '</td>' .
						'<td>' . $treningList[$i][16] . '</td>' .
						'<td>' . $treningList[$i][17] . '</td>' .
						'<td>' . $treningList[$i][18] . '</td>' .
						'<td>' . $treningList[$i][19] . '</td>' .
						'<td>' . $treningList[$i][20] . '</td>' .
						'<td>' . $treningList[$i][21] . '</td>' .
						'<td>' . $treningList[$i][22] . '</td>' .
						'<td>' . $treningList[$i][23] . '</td>' .
						'<td>' . $treningList[$i][24] . '</td>' .
						'</tr>';

					}

				?>
			</table>
		</div>
	</div>

<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
