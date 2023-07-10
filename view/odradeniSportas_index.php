<?php 
$activePage = 'OdradeniSportas';
require_once __SITE_PATH . '/view/_headerSportas.php';
 ?>


	<div class="trening-info">
		<h2>Popis odrađenih treninga:</h2>
		<table>
			<tr><th>Datum</th><th>Vrsta</th><th>Ime</th><th> 1 </th><th>Rezultat 1</th><th> 2</th><th>Rezultat 2</th><th> 3</th><th>Rezultat 3</th><th> 4</th><th>Rezultat 4</th><th> 5</th><th>Rezultat 5</th></tr>
			<?php 

				if(Count($treningList)<5){$a=Count($treningList);}
				else {$a=5;}
				for($i=0; $i<$a; $i++){
					echo '<tr>' .
					'<td>' . $treningList[$i][2] . '</td>' .
					'<td>' . $treningList[$i][3] . '</td>' .
					'<td>' . $treningList[$i][4] . '</td>' .
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
	

					'</tr>';

				}
								
				
			?>
		</table>
		
	</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
