<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>

    <div class="trening-info" id="odbrojavanje">
        <h2>Odbrojavanje do prvog natjecanja</h2>
        <div id="countdown"></div>
    </div>

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
   
    <script>
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

    // Update the count down every 1 second
    var x = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the closest date
        var distance = closestDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

       // Combine the event name and countdown into one string
        var countdownText = closestEvent + " za: " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        // Output the result in an element with id="countdown"
        document.getElementById("countdown").innerHTML = countdownText;

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
});

	</script>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>
