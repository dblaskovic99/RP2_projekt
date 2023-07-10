<?php 
    $activePage = 'obavijestiTrener';
    require_once __DIR__ . '/_headerTrener.php'; 
?>

<form method="POST" action="index.php?rt=obavijestiTrener/dodajObavijest" class="obavijest">
    <label for="novaobavijest">Dodaj novu obavijest:</label><br>
    <textarea id="novaobavijest" name="novaobavijest" required></textarea><br>
    <input type="submit" value="Dodaj obavijest">
</form>

<?php 
    foreach( array_reverse($list) as $obavijest )
    {
        echo '<div class="obavijest-box">' ;
        echo '<p style="color: grey; font-size: 10px;">' . $obavijest['date'] . '<p>';
        echo '<p style="font-size: 20px;"><strong>' . $obavijest['username'] . '</strong>: ' . $obavijest['obavijest'] . '</p>' ;

        // Forma za komentar
        echo '<form method="POST" action="index.php?rt=obavijestiTrener/dodajKomentar">';
        echo '<input type="hidden" name="id_obavijesti" value="' . $obavijest['id_obavijesti'] . '" />';
        echo '<input type="text" name="komentar" placeholder="Vaš komentar" required />';
        echo '<input type="submit" value="Pošalji komentar">';
        echo '</form>';

        // Ispis svih komentara za ovu obavijest
        foreach( $obavijest['komentari'] as $komentar )
        {
            echo '<p style="font-size: 15px;"><strong>' . $komentar['username'] . '</strong>: ' . $komentar['komentar'] . '</p>';
        }

        echo '</div>';
    }
?>

<?php require_once __DIR__ . '/_footer.php'; ?>
