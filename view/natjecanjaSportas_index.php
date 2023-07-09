<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>


	<div class="trening-info">
		<h2>Buduća natjecanja</h2>
		<table>
			<tr><th>Datum</th><th>Ime</th><th>Lokacija</th><th>Disciplina</th>
			<?php 

				for($i=0; $i<Count($natjecanjaList); $i++){
					

					
					echo '<tr>' .
					'<td>' . $natjecanjaList[$i][2] . '</td>' .
					'<td>' . $natjecanjaList[$i][3] . '</td>' .
					'<td>' . $natjecanjaList[$i][4] . '</td>' .
                    '<td>' . $natjecanjaList[$i][5] . '</td>' .

					'</tr>';
					echo '</form>';

				}
				
				
			?>
		</table>
		
	</div>



<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
