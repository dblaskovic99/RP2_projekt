<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>


	<div class="trening-info">
		<h2>Popis neodrađenih treninga:</h2>
		<table>
			<tr><th>Vrsta</th><th>Ime</th><th> 1 </th><th> 2</th><th> 3</th><th> 4</th><th> 5</th><th> 6</th><th> 7</th><th> 8</th><th> 9</th><th> 10</th>
			<?php 

				for($i=0; $i<Count($treningList); $i++){
					echo '<tr>' .
					'<td> <a href="' . __SITE_URL .'/index.php?rt=napraviTreningSportas&id_trening=' . $treningList[$i][0] . '">' . $treningList[$i][2] . '</td>' .
					'<td>' . $treningList[$i][3] . '</td>' .
					'<td>' . $treningList[$i][5] . '</td>' .
					'<td>' . $treningList[$i][7] . '</td>' .
					'<td>' . $treningList[$i][9] . '</td>' .
					'<td>' . $treningList[$i][11] . '</td>' .
					'<td>' . $treningList[$i][13] . '</td>' .
					'<td>' . $treningList[$i][15] . '</td>' .
					'<td>' . $treningList[$i][17] . '</td>' .
					'<td>' . $treningList[$i][19] . '</td>' .
					'<td>' . $treningList[$i][21] . '</td>' .
					'<td>' . $treningList[$i][23] . '</td>' .

					'</tr>';

				}
				
				
			?>
		</table>
		
	</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
