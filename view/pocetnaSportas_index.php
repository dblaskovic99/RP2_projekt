<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>


	<h2>Popis neodrađenih treninga:</h2>
	<div class="trening-info">
	<table>
			<tr><th>Vrsta</th><th>Ime</th><th> 1 </th><th> 2</th><th> 3</th><th> 4</th><th> 5</th><th> 6</th><th> 7</th><th> 8</th><th> 9</th><th> 10</th>
			<?php 
				foreach( $treningList as $trening )
				{
					echo '<tr>' .
						'<td>' . $trening->vrsta . '</td>' .
						'<td>' . $trening->ime . '</td>' .
						'<td>' . $trening->interval1 . '</td>' .
						'<td>' . $trening->intreval2 . '</td>' .
						'<td>' . $trening->intreval3 . '</td>' .
						'<td>' . $trening->intreval4 . '</td>' .
						'<td>' . $trening->intreval5 . '</td>' .
						'<td>' . $trening->intreval6 . '</td>' .
						'<td>' . $trening->intreval7 . '</td>' .
						'<td>' . $trening->intreval8 . '</td>' .
						'<td>' . $trening->interval9 . '</td>' .
						'<td>' . $trening->intreval10 . '</td>' .	
                        '<td><button onclick="' . __SITE_URL .'/index.php?rt=napraviTreningSportas&id_trening=' . $trening->id_trening . '">Ažuriraj trening</button></td>' .					
						'</tr>';
				}
			?>
		</table>
	</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
