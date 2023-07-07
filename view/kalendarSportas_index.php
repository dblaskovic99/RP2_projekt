<?php require_once __SITE_PATH . '/view/_headerSportas.php'; ?>

    <?php
    
    // Dobivamo prvi i zadnji dan trenutnog mjeseca
    $firstDay = date('N', strtotime($year . '-' . $month . '-01'));
    $numDays = date('t', strtotime($year . '-' . $month . '-01'));
    
    // Prethodni mjesec i godina
    $prevMonth = date('m', strtotime('-1 month', strtotime($year . '-' . $month . '-01')));
    $prevYear = date('Y', strtotime('-1 month', strtotime($year . '-' . $month . '-01')));
    
    // Sljedeæi mjesec i godina
    $nextMonth = date('m', strtotime('+1 month', strtotime($year . '-' . $month . '-01')));
    $nextYear = date('Y', strtotime('+1 month', strtotime($year . '-' . $month . '-01')));
    ?>
    <form method="post" action="<?php echo __SITE_URL . '/index.php?rt=kalendarSportas'?>">
    <?php
    echo '<table>';
    echo '<tr>';
    echo '<th><input type="hidden" name="prevMonth" value="' . $prevMonth . '">
                <input type="hidden" name="prevYear" value="' . $prevYear . '">
                <button type="submit" name="previous">&lt;</button></th>';
    echo '<th colspan="5">' . strftime('%B', strtotime($year . '-' . $month . '-01')) . ' ' . $year . '</th>';
    echo '<th><input type="hidden" name="nextMonth" value="' . $nextMonth . '">
                <input type="hidden" name="nextYear" value="' . $nextYear . '">
                <button type="submit" name="next">&gt;</button></th>';
    echo '</tr>';
    echo '<th>Pon</th>';
    echo '<th>Uto</th>';
    echo '<th>Sri</th>';
    echo '<th>Cet</th>';
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
            } 
            else {
                if ($dayCount == date('j') && $month == date('m') && $year == date('Y')) {
                    echo '<td class="current-month">' . $dayCount;
                } 
                
                else {
                    echo '<td>' . $dayCount;
                }
                
                foreach ( $treningList as $trening ) {
                    $datumTrening = $trening[2]; // Pretpostavljamo da je format datuma "Y-m-d" (npr. "2023-07-01")
                    $danTrening = date('d', strtotime($datumTrening));
                    $mjesecTrening = date('m', strtotime($datumTrening));
                    $godinaTrening = date('Y', strtotime($datumTrening));

                    
                    if ($danTrening == $dayCount && $mjesecTrening == $month && $godinaTrening == $year) {
                        echo '<br>' . $trening[3] . ' ' . $trening[4];
                    }
                }

               /*foreach( $natjecanjeList as $natjecanje ) {
                    $datumNatjecanje = $natjecanje->datum; // Pretpostavljamo da je format datuma "Y-m-d" (npr. "2023-07-01")
                    $danNatjecanje = date('d', strtotime($datum));
                    $mjesecNtjecanje = date('m', strtotime($datum));
                    $godinaNatjecanje = date('Y', strtotime($datum));
                    
                     if ($danNatjecanje == $dayCount && $mjesecNatjecanje == $month && $godinaNatjecanje == $year) {
                        echo $natjecanje.ime;
                    }
               }*/

               echo '</td>';

                $dayCount++;
            }
        } 
        else {
            echo '<td></td>';
        }
    }
    echo '</tr>';
}
    echo '</table>';
?>
</form>


<?php require_once __SITE_PATH . '/view/_footer.php'; ?>

