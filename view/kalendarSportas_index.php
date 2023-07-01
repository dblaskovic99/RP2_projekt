<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>

    <?php
        // Provjeravamo je li prethodni mjesec zatražen
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $currentMonth = $_GET['month'];
            $currentYear = $_GET['year'];
        } else {
            // Inaèe postavljamo trenutni mjesec i godinu
            $currentDate = strtotime(date('Y-m-d'));
            $currentMonth = date('m', $currentDate);
            $currentYear = date('Y', $currentDate);
        }
        
        // Dobivamo prvi i zadnji dan trenutnog mjeseca
        $firstDay = date('N', strtotime($currentYear . '-' . $currentMonth . '-01'));
        $numDays = date('t', strtotime($currentYear . '-' . $currentMonth . '-01'));
        
        // Prethodni mjesec i godina
        $prevMonth = date('m', strtotime('-1 month', strtotime($currentYear . '-' . $currentMonth . '-01')));
        $prevYear = date('Y', strtotime('-1 month', strtotime($currentYear . '-' . $currentMonth . '-01')));
        
        // Sljedeæi mjesec i godina
        $nextMonth = date('m', strtotime('+1 month', strtotime($currentYear . '-' . $currentMonth . '-01')));
        $nextYear = date('Y', strtotime('+1 month', strtotime($currentYear . '-' . $currentMonth . '-01')));
        
        // Kreiramo tablicu kalendara
        echo '<table>';
        echo '<tr>';
        echo '<th><a href="?month=' . $prevMonth . '&year=' . $prevYear . '">&lt;</a></th>';
        echo '<th colspan="5">' . date('F', strtotime($currentYear . '-' . $currentMonth . '-01')) . ' ' . $currentYear . '</th>';
        echo '<th><a href="?month=' . $nextMonth . '&year=' . $nextYear . '">&gt;</a></th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Pon</th>';
        echo '<th>Uto</th>';
        echo '<th>Sri</th>';
        echo '<th>Èet</th>';
        echo '<th>Pet</th>';
        echo '<th>Sub</th>';
        echo '<th>Ned</th>';
        echo '</tr>';
        
        // Broj redova u tablici
        $numRows = ceil(($numDays + $firstDay - 1) / 7);
        
        // Brojaè dana
        $dayCount = 1;
        
        // Kreiranje redova i æelija za svaki dan
        for ($row = 1; $row <= $numRows; $row++) {
            echo '<tr>';
            for ($col = 1; $col <= 7; $col++) {
                if ($dayCount <= $numDays) {
                    if ($row == 1 && $col < $firstDay) {
                        echo '<td></td>';
                    } else {
                        if ($dayCount == date('j') && $currentMonth == date('m') && $currentYear == date('Y')) {
                            echo '<td class="current-month">' . $dayCount . '</td>';
                        } else {
                            echo '<td>' . $dayCount . '</td>';
                        }
                        $dayCount++;
                    }
                } else {
                    echo '<td></td>';
                }
            }
            echo '</tr>';
        }
        
        echo '</table>';
    ?>

<?php require_once __SITE_PATH . '/view/_footer.php'; ?>

