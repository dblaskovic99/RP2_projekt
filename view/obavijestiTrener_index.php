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
    $id = $obavijest['id'];  
    echo '<div class="obavijest-container">';
    echo '<div class="obavijest-box">';
    echo '<p style="color: grey; font-size: 10px;">' . $obavijest['date'] . '<p>';
    echo '<p style="font-size: 20px;"><strong>' . $obavijest['username'] . '</strong>: ' . $obavijest['obavijest'] . '</p>';
    echo '<button onclick="prikaziKomentare(' . $id . ')" class="prikazi-komentare">Prikaži komentare</button>';
    echo '</div>'; //obavijest-box

    // Start of comment box
    echo '<div class="komentar-box" id="komentar-box-' . $id . '" style="display: none;">';  // Sakrij komentar-box na početku
    echo '<form method="POST" action="index.php?rt=obavijestiTrener/dodajKomentar" class="komentar">';
    echo '<input type="hidden" name="id_obavijesti" value="' . $obavijest['id'] . '" />';
    echo '<input type="text" id="komentar" name="komentar" placeholder="Vaš komentar" required />';
    echo '<input type="submit" value="Pošalji komentar">';
    echo '</form>';

    $rs = new Service();
    $komentari = $rs->dohvatiKomentare($obavijest['id']);
    // Ispis svih komentara za ovu obavijest
    foreach(array_reverse($komentari) as $komentar)
    {
        echo '<p style="font-size: 15px;"><strong>' . htmlspecialchars($komentar['username']) . '</strong>: ' . htmlspecialchars($komentar['komentar']) . '</p>';
    }
    echo '</div>'; // komentar-box
    echo '</div>'; // obavijest-container
}
?>

<?php require_once __DIR__ . '/_footer.php'; ?>
