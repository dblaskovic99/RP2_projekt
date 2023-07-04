<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>


	<div class="trening-info">
		<h2>Popis neodrađenih treninga:</h2>
		<table>
			<tr><th>Vrsta</th><th>Ime</th><th> 1 </th><th> Rezultat 1 </th><th> 2</th><th> Rezultat 2 </th><th> 3</th><th> Rezultat 3 </th><th> 4</th><th> Rezultat 4 </th><th> 5</th><th> Rezultat 5 </th><th> 6</th><th> Rezultat 6 </th><th> 7</th><th> Rezultat 7 </th><th> 8</th><th> Rezultat 8 </th><th> 9</th><th> Rezultat 9 </th><th> 10</th><th> Rezultat 10 </th>
			<?php 

				for($i=0; $i<Count($treningList); $i++){
					
					echo '<form method="post" action="' . __SITE_URL .'/index.php?rt=napraviTreningSportas&id_trening=' . $treningList[$i][0] . '">';

					
					echo '<tr>' .
					'<td> <a href="' . __SITE_URL .'/index.php?rt=napraviTreningSportas&id_trening=' . $treningList[$i][0] . '">' . $treningList[$i][2] . '</td>' .
					'<td>' . $treningList[$i][3] . '</td>' .
					'<td>' . $treningList[$i][5] . '</td>' .
					'<td><input type="text" name="rez_interval1" /></td>' .
					'<td>' . $treningList[$i][7] . '</td>' .
					'<td><input type="text" name="rez_interval2" /></td>' .
					'<td>' . $treningList[$i][9] . '</td>' .
					'<td><input type="text" name="rez_interval3" /></td>' .
					'<td>' . $treningList[$i][11] . '</td>' .
					'<td><input type="text" name="rez_interval4" /></td>' .
					'<td>' . $treningList[$i][13] . '</td>' .
					'<td><input type="text" name="rez_interval5" /></td>' .
					'<td>' . $treningList[$i][15] . '</td>' .
					'<td><input type="text" name="rez_interval6" /></td>' .
					'<td>' . $treningList[$i][17] . '</td>' .
					'<td><input type="text" name="rez_interval7" /></td>' .
					'<td>' . $treningList[$i][19] . '</td>' .
					'<td><input type="text" name="rez_interval8" /></td>' .
					'<td>' . $treningList[$i][21] . '</td>' .
					'<td><input type="text" name="rez_interval9" /></td>' .
					'<td>' . $treningList[$i][23] . '</td>' .
					'<td><input type="text" name="rez_interval10" /></td>' .
					'<td><input type="submit">Spremi trening!</td>' .

					'</tr>';
					echo '</form>';

				}
				
				
			?>
		</table>
		
	</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
