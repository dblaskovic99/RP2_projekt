<?php

class Service{
    function getSviSportasi($id_trener){
        $trener = $this->getTrenerPoID($id_trener);
        try
		{
			$db = DB::getConnection();
            $st = $db->prepare('SELECT id_sportas, username, password_hash, ime, prezime, datum_rodenja, kategorija, id_trener, id_klub, registration_sequence, has_registered FROM sportas WHERE id_trener = :id_trener');
			$st->execute(array( 'id_trener' => $id_trener ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Sportas( $row['id_sportas'], $row['username'], $row['password_hash'], $row['ime'], $row['prezime'], $row['datum_rodenja'], $row['kategorija'], $row['id_trener'], $row['id_klub'], $row['registration_sequence'], $row['has_registered'] );
		}

		return $arr;
    }

	function generirajKlubove() {
		$db = DB::getConnection();
		$klubovi = [];

		try {
        $st = $db->prepare('SELECT id_klub, ime_kluba FROM klub');
        $st->execute();
        $klubovi = $st->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
        echo 'Greška prilikom dohvaćanja klubova iz baze podataka!';
        return [];
		}

		return $klubovi;
	}

    
	function getSportasPoUsername( $username )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM sportas WHERE username = :username');
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
		$row = $st->fetch();
		if( $row === false )
			return null;
        else
			return new Sportas ($row['id_sportas'], $row['username'],
			$row['password_hash'], $row['ime'], $row['prezime'],
			$row['datum_rodenja'], $row['kategorija'], $row['id_trener'] ,
			$row['id_klub'], $row['registration_sequence'], $row['has_registered']);
	}

	function getTrenerPoKlubu($id_klub)
	{
		try {
		$db = DB::getConnection();
		$st = $db->prepare('SELECT * FROM trener WHERE id_klub = :id_klub');
		$st->execute(array('id_klub' => $id_klub));
		$treners = $st->fetchAll(PDO::FETCH_ASSOC);
		return $treners;
		} 
		catch (PDOException $e) {
		echo 'Greška prilikom dohvaćanja trenera iz baze podataka!';
		return null;
		}
	}


    function getTrenerPoID( $id_trener )
	{
		try
		{
            $db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM trener WHERE id_trener = :id_trener');
			$st->execute( array( 'id_trener' => $id_trener ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Trener( $row['id_trener'],$row['username'], $row['password_hash'], $row['ime'], $row['prezime'], $row['id_klub'], $row['registration_sequence'], $row['has_registered']);
	}

    function getTrenerPoUsername( $username )
	{
		try
		{
            $db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM trener WHERE username = :username');
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		if( $row === false )
			return null;
		else
			return new Trener( $row['id_trener'],$row['username'], $row['password_hash'], $row['ime'], $row['prezime'], $row['id_klub'], $row['registration_sequence'], $row['has_registered']);
	}

	function getAdminPoUsername( $username )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM klub WHERE username = :username');
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
		$row = $st->fetch();
		if( $row === false )
			return null;
        else
			return new Klub ($row['id_klub'], $row['id_sport'],
			$row['ime_kluba'], $row['grad'], $row['drzava'],
			$row['username'], $row['password_hash'], 
			$row['registration_sequence'], $row['has_registered']);

	}
	function getTreningPoSportasOdradeni($id_sportas)
	{
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM trening WHERE id_sportas = :id_sportas AND odraden=1');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetchAll();
		return $trening;	
	}

	function getTreningPoID($id_trening)
	{
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM trening WHERE id_trening = :id_trening');
			$st->execute(array('id_trening' => $id_trening));
		} 
		catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetchAll();
		return $trening;
	}
	
	function getNeodradeneTreninge($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM trening WHERE id_sportas = :id_sportas AND odraden=0');
			$st->execute(array('id_sportas' => $id_sportas));
		} 
		catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetchAll();
		return $trening;
	}

	function getSveTreninge($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM trening WHERE id_sportas = :id_sportas');
			$st->execute(array('id_sportas' => $id_sportas));
		} 
		catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetchAll();
		return $trening;
	}

	function getNatjecanjePoID($id_natjecanje)
	{
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM natjecanje WHERE id_natjecanje = :id_natjecanje');
			$st->execute(array('id_natjecanje' => $id_natjecanje));
		} 
		catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$natjecanje=$st->fetchAll();
		return $natjecanje;
	}

	function getBuducaNatjecanja($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM natjecanje WHERE id_sportas = :id_sportas');
			$st->execute(array('id_sportas' => $id_sportas));
		} 
		catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$natjecanje=$st->fetchAll();
		return $natjecanje;
	}

	function napraviTrening($id_trening, $rez_interval1, $rez_interval2, $rez_interval3, $rez_interval4, $rez_interval5, $rez_interval6, $rez_interval7, $rez_interval8, $rez_interval9, $rez_interval10){
		$db = DB::getConnection();
		try{
			$st = $db->prepare('UPDATE trening SET odraden = 1, rez_interval1 = :rez_interval1, rez_interval2 = :rez_interval2, rez_interval3 = :rez_interval3, rez_interval4 = :rez_interval4, rez_interval5 = :rez_interval5, rez_interval6 = :rez_interval6, rez_interval7 = :rez_interval7, rez_interval8 = :rez_interval8, rez_interval9 = :rez_interval9, rez_interval10 = :rez_interval10 WHERE id_trening = :id_trening');
			$st->execute (array('id_trening' => $id_trening,
		
									'rez_interval1' => $rez_interval1, 
									'rez_interval2' => $rez_interval2, 
									'rez_interval3' => $rez_interval3, 
									'rez_interval4' => $rez_interval4, 
									'rez_interval5' => $rez_interval5, 
									'rez_interval6' => $rez_interval6, 
									'rez_interval7' => $rez_interval7, 
	
									
									'rez_interval8' => $rez_interval8, 
									'rez_interval9' => $rez_interval9, 
									'rez_interval10' => $rez_interval10));
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	function odradiNatjecanje($id_natjecanje, $rezultat){
		$db = DB::getConnection();
		try{
			$st = $db->prepare('UPDATE natjecanje SET rezultat = :rezultat WHERE id_natjecanje = :id_natjecanje');
			$st->execute (array('id_natjecanje' => $id_natjecanje,
									'rezultat' => $rezultat));
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	function azuriraj1xSZ($id_klub, $noviRezultat) {
    $db = DB::getConnection();
    try {
        $st = $db->prepare('UPDATE klub SET `1x SZ` = :noviRezultat WHERE id_klub = :id_klub');
        $st->execute(array('noviRezultat' => $noviRezultat, 'id_klub' => $id_klub));
    } 
    catch (PDOException $e) {
        echo 'Greška prilikom ažuriranja rezultata kluba!';
        return false;
    }

    return true;
	}


	function azuriraj2xSZ($id_klub, $noviRezultat) {
    $db = DB::getConnection();
    try {
        $st = $db->prepare('UPDATE klub SET `2x SZ` = :noviRezultat WHERE id_klub = :id_klub');
        $st->execute(array('noviRezultat' => $noviRezultat, 'id_klub' => $id_klub));
    } 
    catch (PDOException $e) {
        echo 'Greška prilikom ažuriranja rezultata kluba!';
        return false;
    }

    return true;
}


	function azuriraj1xSM($id_klub, $noviRezultat) {
    $db = DB::getConnection();
    try {
        $st = $db->prepare('UPDATE klub SET `1x SM` = :noviRezultat WHERE id_klub = :id_klub');
        $st->execute(array('noviRezultat' => $noviRezultat, 'id_klub' => $id_klub));
    } 
    catch (PDOException $e) {
        echo 'Greška prilikom ažuriranja rezultata kluba!';
        return false;
    }

    return true;
}


	function azuriraj2xSM($id_klub, $noviRezultat) {
    $db = DB::getConnection();
    try {
        $st = $db->prepare('UPDATE klub SET `2x SM` = :noviRezultat WHERE id_klub = :id_klub');
        $st->execute(array('noviRezultat' => $noviRezultat, 'id_klub' => $id_klub));
    } 
    catch (PDOException $e) {
        echo 'Greška prilikom ažuriranja rezultata kluba!';
        return false;
    }

    return true;
}


	function getKlubByID($id_klub) {
    $db = DB::getConnection();
    try {
        $st = $db->prepare('SELECT * FROM klub WHERE id_klub = :id_klub');
        $st->execute(array('id_klub' => $id_klub));
        $rezultat = $st->fetch(PDO::FETCH_ASSOC);
        return $rezultat;
    } catch (PDOException $e) {
        echo 'Greška prilikom dohvaćanja rezultata kluba!';
        return null;
    }
	}



	function dodajTreningTrener($id_sportas, $datum, $vrsta, $ime, $interval1, $interval2, $interval3, $interval4, $interval5, $interval6, $interval7, $interval8, $interval9, $interval10){
		$db = DB::getConnection();
		try{
			$st = $db->prepare('INSERT INTO trening (id_sportas, datum, vrsta, ime, odraden, interval1, rez_interval1, interval2, interval3, interval4, interval5, interval6, interval7, interval8, interval9, interval10) VALUES '.
								'(:id_sportas, :datum, :vrsta, :ime, 0, :interval1, 0, :interval2, :interval3, :interval4, :interval5, :interval6, :interval7, :interval8, :interval9, :interval10)');
			$st->execute (array('id_sportas' => $id_sportas,
									'datum' => $datum,
									'vrsta' => $vrsta, 
									'ime' => $ime, 
									'interval1' => $interval1, 
									'interval2' => $interval2, 
									'interval3' => $interval3, 
									'interval4' => $interval4, 
									'interval5' => $interval5, 
									'interval6' => $interval6, 
									'interval7' => $interval7, 
									'interval8' => $interval8, 
									'interval9' => $interval9, 
									'interval10' => $interval10));
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	function dodajNatjecanjeTrener($id_sportas, $datum, $ime, $lokacija, $disciplina){
		$db = DB::getConnection();
		try{
			$st = $db->prepare('INSERT INTO natjecanje(id_sportas, datum, ime, lokacija, disciplina, rezultat) VALUES '.
								'(:id_sportas, :datum, :ime, :lokacija, :disciplina, 0)');
			$st->execute (array('id_sportas' => $id_sportas,
									'datum' => $datum,
									'ime' => $ime, 
									'lokacija' => $lokacija, 
									'disciplina' => $disciplina));
		}
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}

	}

	function dodajNovogTrenera($username, $password, $ime, $prezime, $id_klub, $reg_seq){
		try {
		$db = DB::getConnection();
		$password_hash = password_hash($password, PASSWORD_DEFAULT); // Hashiranje lozinke
		$st = $db->prepare('INSERT INTO trener(username, password_hash, ime, prezime, id_klub, registration_sequence, has_registered) VALUES ' .
							'(:username, :password_hash, :ime, :prezime, :id_klub, :registration_sequence, 1)');
		$st->execute(array(
			'username' => $username,
			'password_hash' => $password_hash,
			'ime' => $ime,
			'prezime' => $prezime,
			'id_klub' => $id_klub,
			'registration_sequence' => $reg_seq
		));
		}
		catch (PDOException $e) {
			echo 'Greska u Service.class.php!';
			return 0;
		}
	}

	function dodajNovogSportasa($username, $password, $ime, $prezime, $datum, $kategorija, $trener, $id_klub, $reg_seq) {
		try {
        $db = DB::getConnection();
        $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hashiranje lozinke
        $st = $db->prepare('INSERT INTO sportas(username, password_hash, ime, prezime, datum_rodenja, kategorija, id_trener, id_klub, registration_sequence, has_registered) VALUES ' .
                            '(:username, :password_hash, :ime, :prezime, :datum_rodenja, :kategorija, :id_trener, :id_klub, :registration_sequence, 1)');
        $st->execute(array(
            'username' => $username,
            'password_hash' => $password_hash,
            'ime' => $ime,
            'prezime' => $prezime,
            'datum_rodenja' => $datum,
            'kategorija' => $kategorija,
            'id_trener' => $trener,
            'id_klub' => $id_klub,
            'registration_sequence' => $reg_seq
        ));
		}
		catch (PDOException $e) {
        echo 'Greska u Service.class.php!';
        return 0;
		}
	}


	function getMax500m($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT MIN(rez_interval1) AS min_rez FROM trening WHERE id_sportas = :id_sportas AND (ime="500m" OR ime="500") AND odraden=1');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetch();
		return $trening['min_rez'];

	}
	function getMax1000m($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT MIN(rez_interval1) AS min_rez FROM trening WHERE id_sportas = :id_sportas AND (ime="1000m" OR ime="1000") AND odraden=1');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetch();
		return $trening['min_rez'];

	}
	function getMax2000m($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT MIN(rez_interval1) AS min_rez FROM trening WHERE id_sportas = :id_sportas AND (ime="2000m" OR ime="2000") AND odraden=1');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetch();
		return $trening['min_rez'];

	}
	function getMax6000m($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT MIN(rez_interval1) AS min_rez FROM trening WHERE id_sportas = :id_sportas AND (ime="6000m" OR ime="6000") AND odraden=1');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetch();
		return $trening['min_rez'];

	}
	function getMax30min($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT MIN(rez_interval1) AS min_rez FROM trening WHERE id_sportas = :id_sportas AND ime="30min" AND odraden=1');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$trening=$st->fetch();
		return $trening['min_rez'];

	}
	function sveObavijestiTrener($id_trener)
	{
		$obavijesti = [];
			
		$db = DB::getConnection();

		// Dohvati sve obavijesti koje je objavio određeni trener i dohvati njegov username
		$st = $db->prepare('SELECT obavijesti.*, trener.username FROM obavijesti 
							JOIN trener ON obavijesti.id_trener = trener.id_trener
							WHERE obavijesti.id_trener = :id_trener');
		$st->execute(['id_trener' => $id_trener]);

		while($row = $st->fetch()) {
			$obavijesti[] = $row;
		}

		return $obavijesti;
	}



	function novaObavijest($id_trener, $obavijest) 
    {
        $db = DB::getConnection();
        $stmt = $db->prepare("INSERT INTO obavijesti (id_trener, obavijest, date) VALUES (:id_trener, :obavijest, NOW())");
        $stmt->bindValue(':id_trener', $id_trener);
        $stmt->bindValue(':obavijest', $obavijest);
        $stmt->execute();
    }
	
	function noviKomentar($id_obavijesti, $username, $komentar) 
    {
        $db = DB::getConnection();
        $stmt = $db->prepare("INSERT INTO komentari (id_obavijesti, username, komentar) VALUES (:id_obavijesti, :username, :komentar)");
        $stmt->bindValue(':id_obavijesti', $id_obavijesti);
        $stmt->bindValue(':username', $username);
		$stmt->bindValue(':komentar', $komentar);
        $stmt->execute();
    }

	function dohvatiKomentare($id_obavijesti) 
	{
		$komentari = [];
			
		$db = DB::getConnection();

		// Dohvati sve komentare za određenu obavijest
		$st = $db->prepare('SELECT * FROM komentari WHERE id_obavijesti = :id_obavijesti');
		$st->execute(['id_obavijesti' => $id_obavijesti]);

		while($row = $st->fetch()) {
			$komentari[] = $row;
		}

		return $komentari;
	}

	
	function obavijestiSportas($id_sportas) 
	{
		$obavijesti = [];
			
		$db = DB::getConnection();
		$st = $db->prepare('SELECT id_trener FROM sportas WHERE id_sportas = :id_sportas');
		$st->execute(['id_sportas' => $id_sportas]);
		$res = $st->fetch();

		if($res === false) {
			return $obavijesti;
		}

		$id_trener = $res['id_trener'];
		
		$st = $db->prepare('SELECT obavijesti.*, trener.username FROM obavijesti 
							JOIN trener ON obavijesti.id_trener = trener.id_trener
							WHERE obavijesti.id_trener = :id_trener');
		$st->execute(['id_trener' => $id_trener]);

		while($row = $st->fetch()) {
			$obavijesti[] = $row;
		}

		return $obavijesti;
	}

}		
?>