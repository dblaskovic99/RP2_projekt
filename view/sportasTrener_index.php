<?php 
$activePage = 'loginTrener';
require_once __SITE_PATH . '/view/_headerTrener.php'; ?>

<div class="row sportas-info">
    <div class="col-md-6">
        <h2><strong>Podaci o korisniku:</strong></h2>

        <ul>
            <li><strong>Username:</strong> <?php echo $sportas->username; ?></li>
            <li><strong>Ime:</strong> <?php echo $sportas->ime; ?></li>
            <li><strong>Prezime:</strong> <?php echo $sportas->prezime; ?></li>
            <li><strong>Datum rođenja:</strong> <?php echo $sportas->datum_rodenja; ?></li>
            <li><strong>Kategorija:</strong> <?php echo $sportas->kategorija; ?></li>
        </ul>
    </div>

    <div class="col-md-6">
        <h2><strong>Rekordi:</strong></h2>
        <ul>
            <li><strong>Najboljih 500m:</strong> <?php echo $max500m; ?></li>
            <li><strong>Najboljih 1000m:</strong> <?php echo $max1000m; ?></li>
            <li><strong>Najboljih 2000m:</strong> <?php echo $max2000m; ?></li>
            <li><strong>Najboljih 6000m:</strong> <?php echo $max6000m; ?></li>
            <li><strong>Najboljih 30min:</strong> <?php echo $max30min; ?></li>
        </ul>
    </div>
</div>

		
	<div class="trening-info">
	<h1>Zadnji odrađeni treninzi:</h1>
	<table>
			<tr><th>Datum</th><th>Vrsta</th><th>Ime</th><th> 1 </th><th>Rezultat 1</th><th> 2</th><th>Rezultat 2</th><th> 3</th><th>Rezultat 3</th><th> 4</th><th>Rezultat 4</th><th> 5</th><th>Rezultat 5</th></tr>
			<?php 
				$broj=Count($treningList);
				if($broj>5){
					$broj=5;
				}
				for($i=0; $i<$broj; $i++){
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
		<h1>Neodrađeni treninzi:</h1>
	<table>
			<tr><th>Datum</th><th>Vrsta</th><th>Ime</th><th> 1 </th><th> 2</th><th> 3</th><th> 4</th><th> 5</th></tr>
			<?php 

				for($i=0; $i<Count($treningListNeodradeni); $i++){
					echo '<tr>' .
					'<td>' . $treningListNeodradeni[$i][2] . '</td>' .
					'<td>' . $treningListNeodradeni[$i][3] . '</td>' .
					'<td>' . $treningListNeodradeni[$i][4] . '</td>' .
					'<td>' . $treningListNeodradeni[$i][6] . '</td>' .
					'<td>' . $treningListNeodradeni[$i][8] . '</td>' .
					'<td>' . $treningListNeodradeni[$i][10] . '</td>' .
					'<td>' . $treningListNeodradeni[$i][12] . '</td>' .
					'<td>' . $treningListNeodradeni[$i][14] . '</td>' .

					'</tr>';

				}

			?>
		</table>
	</div>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
