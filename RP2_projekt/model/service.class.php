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
        $st = $db->prepare('SELECT * FROM trening WHERE id_sportas = :id_sportas');
        $st->execute(array('id_sportas' => $id_sportas));
    } catch (PDOException $e) {
        exit('PDO error ' . $e->getMessage());
    }

    $arr = array();
    while ($row = $st->fetch()) {
        $arr[] = new Trening(
            $row['id_trening'],
            $row['id_sportas'],
            $row['vrsta'],
            $row['ime'],
			$row['odraden'],
            $row['interval1'],
            $row['rez_interval1'],
            $row['interval2'],
            $row['rez_interval2'],
            $row['interval3'],
            $row['rez_interval3'],
            $row['interval4'],
            $row['rez_interval4'],
            $row['interval5'],
            $row['rez_interval5'],
            $row['interval6'],
            $row['rez_interval6'],
            $row['interval7'],
            $row['rez_interval7'],
            $row['interval8'],
            $row['rez_interval8'],
            $row['interval9'],
            $row['rez_interval9'],
            $row['interval10'],
            $row['rez_interval10']
        );
    }

    return $arr;
}


		function dodajTreningTrener($id_sportas, $vrsta, $ime, $interval1, $interval2, $interval3, $interval4, $interval5, $interval6, $interval7, $interval8, $interval9, $interval10){
			$db = DB::getConnection();
			try{
				$st = $db->prepare('INSERT INTO trening (id_sportas, vrsta, ime, odraden, interval1, rez_interval1, interval2, interval3, interval4, interval5, interval6, interval7, interval8, interval9, interval10) VALUES '.
									'(:id_sportas, :vrsta, :ime, 0, :interval1, 0, :interval2, :interval3, :interval4, :interval5, :interval6, :interval7, :interval8, :interval9, :interval10)');
				$st->execute (array('id_sportas' => $id_sportas,
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
			
			$st->execute( array( 'username' => $username, 
								'password_hash' => password_hash( $password, PASSWORD_DEFAULT ), 
								'ime' => $ime, 
								'prezime'  => $prezime,
								'id_klub' => $id_klub,
								'registration_sequence'  => $reg_seq ) );
		}
		catch( PDOException $e ) { exit( 'Greška u bazi: ' . $e->getMessage() ); }
	}
	function getNeodradeneTreninge($id_sportas){
		try {
			$db = DB::getConnection();
			$st = $db->prepare('SELECT * FROM trening WHERE id_sportas = :id_sportas AND odraden=0');
			$st->execute(array('id_sportas' => $id_sportas));
		} catch (PDOException $e) {
			exit('PDO error ' . $e->getMessage());
		}
	
		$arr = array();
		while ($row = $st->fetch()) {
			$arr[] = new Trening(
				$row['id_trening'],
				$row['id_sportas'],
				$row['vrsta'],
				$row['ime'],
				$row['odraden'],
				$row['interval1'],
				$row['rez_interval1'],
				$row['interval2'],
				$row['rez_interval2'],
				$row['interval3'],
				$row['rez_interval3'],
				$row['interval4'],
				$row['rez_interval4'],
				$row['interval5'],
				$row['rez_interval5'],
				$row['interval6'],
				$row['rez_interval6'],
				$row['interval7'],
				$row['rez_interval7'],
				$row['interval8'],
				$row['rez_interval8'],
				$row['interval9'],
				$row['rez_interval9'],
				$row['interval10'],
				$row['rez_interval10']
			);
	}    return $arr;


}}


?>
