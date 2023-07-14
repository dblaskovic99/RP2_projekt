<?php 
$activePage = 'treningSportas';
require_once __SITE_PATH . '/view/_headerSportas.php'; ?>


	<div class="trening-info">
		<h2>Popis neodrađenih treninga:</h2>
		<table>
			<tr><th>Vrsta</th><th>Ime</th><th> 1 </th><th> Rezultat 1 </th><th> 2</th><th> Rezultat 2 </th><th> 3</th><th> Rezultat 3 </th><th> 4</th><th> Rezultat 4 </th><th> 5</th><th> Rezultat 5 </th><th> Intenzitet </th>
			<?php 

				for($i=0; $i<Count($treningList); $i++){
					
					echo '<form method="post" action="' . __SITE_URL .'/index.php?rt=napraviTreningSportas&id_trening=' . $treningList[$i][0] . '">';

					
					echo '<tr>' .
					'<td>' . $treningList[$i][3] . '</td>' .
					'<td>' . $treningList[$i][4] . '</td>' .
					'<td>' . $treningList[$i][6] . '</td>' .
					'<td><input type="text" name="rez_interval1" /></td>' .
					'<td>' . $treningList[$i][8] . '</td>' .
					'<td><input type="text" name="rez_interval2" /></td>' .
					'<td>' . $treningList[$i][10] . '</td>' .
					'<td><input type="text" name="rez_interval3" /></td>' .
					'<td>' . $treningList[$i][12] . '</td>' .
					'<td><input type="text" name="rez_interval4" /></td>' .
					'<td>' . $treningList[$i][14] . '</td>' .
					'<td><input type="text" name="rez_interval5" /></td>' .
					'<td><input type="submit" value="Spremi trening!"> </input></td>' .

					'</tr>';
					echo '</form>';

				}
			?>
		</table>
	</div>

<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
