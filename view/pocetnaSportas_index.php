<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>

	<div class="natjecanje-info">
		<h2>Popis natjecanja:</h2>
		<table>
			<tr><th>Vrsta</th><th>Ime</th><th>Datum</th></tr>
			<?php 

				/*for($i=0; $i<Count($natjecanjeList); $i++){
					echo '<tr>' .
				
					ispisati natjecnaja iz natjecanjeList
					'</tr>';
				}
				*/
				
				
			?>
		</table>
		
	</div>

	<div class="trening-info">
		<h2>Popis neodrađenih treninga:</h2>
		<table>
			<tr><th>Trening</th><th>Datum</th><th> 1 </th><th> 2</th><th> 3</th><th> 4</th><th> 5</th><th> 6</th><th> 7</th><th> 8</th><th> 9</th><th> 10</th>
			<?php 

				for($i=0; $i<Count($treningList); $i++){
					echo '<tr>' .
					'<td> <a href="' . __SITE_URL .'/index.php?rt=napraviTreningSportas&id_trening=' . $treningList[$i][3] . '">' . $treningList[$i][4] . '</td>' .
					'<td>' . $treningList[$i][2]. '</td>' . //datum
					'<td>' . $treningList[$i][4] . '</td>' .
					'<td>' . $treningList[$i][6] . '</td>' .
					'<td>' . $treningList[$i][8] . '</td>' .
					'<td>' . $treningList[$i][10] . '</td>' .
					'<td>' . $treningList[$i][12] . '</td>' .
					'<td>' . $treningList[$i][14] . '</td>' .
					'<td>' . $treningList[$i][16] . '</td>' .
					'<td>' . $treningList[$i][18] . '</td>' .
					'<td>' . $treningList[$i][20] . '</td>' .
					'<td>' . $treningList[$i][22] . '</td>' .
					'<td>' . $treningList[$i][24] . '</td>' .

					'</tr>';

				}
				
				
			?>
		</table>
		
	</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
