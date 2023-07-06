<?php require_once __DIR__ . '/_headerTrener.php'; ?>


<form method="POST" action="index.php?rt=obavijestiTrener/dodajObavijest" class="quack">
    <label for="novaobavijest">Dodaj novu obavijest:</label><br>
    <textarea id="novaobavijest" name="novaobavijest" required></textarea><br>
    <input type="submit" value="Dodaj obavijest">
</form>

<?php 
	foreach( $list as $obavijest )
	{
		echo '<div class="obavijest-box">' ;
        echo '<p style="color: grey; font-size: 10px;">' . $obavijest->date . '<p>';
		echo '<p style="font-size: 20px;">' . $obavijest->obavijest . '</p>' ;
		echo '</div>';
	}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>