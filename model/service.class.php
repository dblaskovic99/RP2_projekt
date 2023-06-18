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




}
?>
