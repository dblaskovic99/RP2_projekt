<?php


require_once __DIR__ . '/db.class.php';

create_table_trening();
create_table_sport();
create_table_klub();
create_table_trener();
create_table_sportas();

exit( 0 );

// --------------------------
function has_table( $tblname )
{
	$db = DB::getConnection();
	
	try
	{
		$st = $db->query( 'SELECT DATABASE()' );
		$dbname = $st->fetch()[0];

		$st = $db->prepare( 
			'SELECT * FROM information_schema.tables WHERE table_schema = :dbname AND table_name = :tblname LIMIT 1' );
		$st->execute( ['dbname' => $dbname, 'tblname' => $tblname] );
		if( $st->rowCount() > 0 )
			return true;
	}
	catch( PDOException $e ) { exit( "PDO error [show tables]: " . $e->getMessage() ); }

	return false;
}


function create_table_sport()
{
	$db = DB::getConnection();

	if( has_table( 'sport' ) )
		exit( 'Tablica sport vec postoji. Obrisite ju pa probajte ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS sport (' .
			'id_sport int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'ime_sporta varchar(50) NOT NULL)' 
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create sport]: " . $e->getMessage() ); }

	echo "Napravio tablicu sport.<br />";
}


function create_table_klub()
{
	$db = DB::getConnection();

	if( has_table( 'klub' ) )
		exit( 'Tablica klub vec postoji. Obrisite ju pa probajte ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS klub (' .
			'id_klub int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'id_sport int NOT NULL,' .
            'ime_kluba varchar(100) NOT NULL,' .
			'grad varchar(100),' .
            'drzava varchar(100))'
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create klub]: " . $e->getMessage() ); }

	echo "Napravio tablicu klub.<br />";
}

function create_table_trener()
{
	$db = DB::getConnection();

	if( has_table( 'trener' ) )
		exit( 'Tablica trener vec postoji. Obrisite ju pa probajte ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS trener (' .
			'id_trener int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'username varchar(50) NOT NULL,' .
			'password_hash varchar(255) NOT NULL,'.
			'ime varchar(50) NOT NULL,' .
			'prezime varchar(100) NOT NULL,' . 
			'id_klub int NOT NULL,' . 
			'registration_sequence varchar(20) NOT NULL,' .
			'has_registered int)'
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create trener]: " . $e->getMessage() ); }

	echo "Napravio tablicu trener.<br />";
}

function create_table_sportas()
{
	$db = DB::getConnection();

	if( has_table( 'sportas' ) )
		exit( 'Tablica sportas vec postoji. Obrisite ju pa probajte ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS sportas (' .
			'id_sportas int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'username varchar(50) NOT NULL,' .
			'password_hash varchar(255) NOT NULL,' . 
			'ime varchar(50) NOT NULL,' . 
			'prezime varchar(100) NOT NULL,' . 
			'datum_rodenja date NOT NULL,' . 
			'kategorija varchar(25) NOT NULL,' .
			'id_trener int NOT NULL,' . 
			'id_klub int NOT NULL,' . 
			'registration_sequence varchar(20) NOT NULL,' .
			'has_registered int)'
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create sportas]: " . $e->getMessage() ); }

	echo "Napravio tablicu sportas.<br />";
}
function create_table_trening()
{
	$db = DB::getConnection();

	if( has_table( 'trening' ) )
		exit( 'Tablica trener vec postoji. Obrisite ju pa probajte ponovno.' );

	try
	{
		$st = $db->prepare( 
			'CREATE TABLE IF NOT EXISTS trening (' .
			'id_trening int NOT NULL PRIMARY KEY AUTO_INCREMENT,' .
			'id_sportas int NOT NULL,' .
			'vrsta varchar(50) NOT NULL,'.
			'odrađen int NOT NULL,'.
			'interval1 varchar(50) NOT NULL,' .
			'rez_interval1 varchar(50),' .
			'interval2 varchar(50),' .
			'rez_interval2 varchar(50),' .
			'interval3 varchar(50),' .
			'rez_interval3 varchar(50),' .
			'interval4 varchar(50),' .
			'rez_interval4 varchar(50),' .
			'interval5 varchar(50),' .
			'rez_interval5 varchar(50),' .
			'interval6 varchar(50),' .
			'rez_interval6 varchar(50),' .
			'interval7 varchar(50),' .
			'rez_interval7 varchar(50),' .
			'interval8 varchar(50),' .
			'rez_interval8 varchar(50),' .
			'interval9 varchar(50),' .
			'rez_interval9 varchar(50),' .
			'interval10 varchar(50),' .
			'rez_interval10 varchar(50))' 
		);

		$st->execute();
	}
	catch( PDOException $e ) { exit( "PDO error [create trening]: " . $e->getMessage() ); }

	echo "Napravio tablicu trening.<br />";
}

?> 