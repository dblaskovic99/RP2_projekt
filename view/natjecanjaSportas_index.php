<?php 
$activePage = 'natjecanjaSportas';
require_once __SITE_PATH . '/view/_headerSportas.php';
?>
    <div class="popup <?php if ($popup == 1) echo 'active'; ?>">
        <p><?php echo $natpis; ?></p>
        <button onclick="closePopup()">Zatvori</button>
    </div>

    <div class="trening-info" id="odbrojavanje">
        <h2>Odbrojavanje do prvog natjecanja</h2>
        <div id="countdown"></div>
    </div>

	<div class="trening-info">
		<h2>Buduća natjecanja</h2>
		<table>
			<tr><th>Datum</th><th>Ime</th><th>Lokacija</th><th>Disciplina</th><th>Rezultat</th><th></th>
			<?php 
				
                for($i=0; $i<Count($natjecanjaList); $i++){
					echo '<form method="post" action="' . __SITE_URL .'/index.php?rt=odradiNatjecanjeSportas&id_natjecanje=' . $natjecanjaList[$i][0] . '">';
					
					echo '<tr>' .
					'<td>' . $natjecanjaList[$i][2] . '</td>' .
					'<td>' . $natjecanjaList[$i][3] . '</td>' .
					'<td>' . $natjecanjaList[$i][4] . '</td>' .
                    '<td>' . $natjecanjaList[$i][5] . '</td>';

                    if ($natjecanjaList[$i][6] == NULL)
                        echo '<td><input type="text" name="rezultat" /></td>' .
                             '<td><input type="submit" value="Spremi natjecanje!"></input></td>';
                    else 
                        echo '<td>' . $natjecanjaList[$i][6] . '</td>';
                    
                    
					echo '</tr>';
					echo '</form>';

				}
				
				
			?>
		</table>
		
	</div>
   
    <script>
    function closePopup() {
        document.querySelector('.popup').classList.remove('active');
    }

   document.addEventListener("DOMContentLoaded", function() {
    // Dohvati datume natjecanja iz PHP-a i spremi ih u JavaScript polje
    var natjecanja = <?php echo json_encode($natjecanjaList); ?>;

    // Pronađi najbliže natjecanje
    var now = new Date().getTime();
    var closestDate = Infinity;
    var closestEvent;
    for (var i = 0; i < natjecanja.length; i++) {
        var natjecanjeDateTime = new Date(natjecanja[i][2] + " 15:00:00").getTime();
        if (natjecanjeDateTime > now && natjecanjeDateTime < closestDate) {
            closestDate = natjecanjeDateTime;
            closestEvent = natjecanja[i][3];
        }
    }

    var x = setInterval(function() {
        var now = new Date().getTime();

        var distance = closestDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        var countdownText = closestEvent + " za: " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        document.getElementById("countdown").innerHTML = countdownText;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
});

	</script>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
