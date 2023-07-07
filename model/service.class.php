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

	function getTreningPoSportas($id_sportas)
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

	/*
	function getNeodradenaNatjecanja($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM natjecanje WHERE id_sportas = :id_sportas AND odraden=0');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
		$natjecanje=$st->fetchAll();
		return $natjecanje;
	}
	*/

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

	function dodajNovogTrenera( $username, $password, $ime, $prezime, $id_klub, $reg_seq )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'INSERT INTO trener(username, password_hash, ime, prezime, id_klub, registration_sequence, has_registered) VALUES ' .
								'(:username, :password_hash, :ime, :prezime, :id_klub, :registration_sequence, 1)' );
		}
		
		catch( PDOException $e ){
			echo 'Greska u Service.class.php!';
			return 0;
		}
	}
			
	function sveObavijestiTrener($id_trener)
	{
		$obavijesti = [];
			
		$db = DB::getConnection();

		// Dohvati sve obavijesti koje je objavio određeni trener
		$st = $db->prepare('SELECT * FROM obavijesti WHERE id_trener = :id_trener');
		$st->execute(['id_trener' => $id_trener]);

		while($row = $st->fetch()) {
			$obavijesti[] = $row;
		}
		$db = DB::getConnection();
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
	
	
	function obavijestiSportas($id_sportas) 
	{
		$obavijesti = [];
			
		$db = DB::getConnection();
	
		// Dohvati id_trener za određenog sportaša
		$st = $db->prepare('SELECT id_trener FROM sportas WHERE id_sportas = :id_sportas');
		$st->execute(['id_sportas' => $id_sportas]);
		$res = $st->fetch();
	
		// Ako nema rezultata, vrati prazan array
		if($res === false) {
			return $obavijesti;
		}
	
		$id_trener = $res['id_trener'];
	
		// Dohvati sve obavijesti koje je objavio određeni trener
		$st = $db->prepare('SELECT * FROM obavijesti WHERE id_trener = :id_trener');
		$st->execute(['id_trener' => $id_trener]);
	
		while($row = $st->fetch()) {
			$obavijesti[] = $row;
		}
	
		return $obavijesti;
	}
}		
?>
