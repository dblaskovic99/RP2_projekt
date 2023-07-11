<?php

// Popunjavamo tablice u bazi "probnim" podacima.
require_once __DIR__ . '/db.class.php';

//seed_table_sport();
//seed_table_klub();
//seed_table_trener();
seed_table_sportas();

exit( 0 );




// ------------------------------------------
function seed_table_sport()
{
	$db = DB::getConnection();

	// Ubaci neke proizvode unutra (ovo nije bas pametno ovako raditi, preko hardcodiranih id-eva usera)
	try
	{
		$st = $db->prepare( 'INSERT INTO sport(ime_sporta) VALUES (:ime_sporta)' );

		$st->execute( array( 'ime_sporta' => 'veslanje' ) );
		$st->execute( array( 'ime_sporta' => 'trčanje' ) );
		$st->execute( array( 'ime_sporta' => 'biciklizam' ) );

		
	}
	catch( PDOException $e ) { exit( "PDO error [sport]: " . $e->getMessage() ); }

	echo "Ubacio u tablicu sport.<br />";
}


// ------------------------------------------
function seed_table_klub()
{
	$db = DB::getConnection();

	// Ubaci neke prodaje unutra (ovo nije bas pametno ovako raditi, preko hardcodiranih id-eva usera i proizvoda)
	try
	{
		$st = $db->prepare( 'INSERT INTO klub(id_sport, ime_kluba, grad, drzava) VALUES (:id_sport, :ime_kluba, :grad, :drzava)' );

		$st->execute( array( 'id_sport'=>'1', 'ime_kluba' => 'Jadran', 'grad' => 'Zadar', 'drzava' => 'Hrvatska', '1x SŽ' => '10:00', '2x SŽ' => '8:00', '1x SM' => '8:00', '2x SM' => '6:00') );
		$st->execute( array( 'id_sport'=>'1', 'ime_kluba' => 'Gusar', 'grad' => 'Split', 'drzava' => 'Hrvatska', '1x SŽ' => '9:30', '2x SŽ' => '7:50', '1x SM' => '8', '2x SM' => '6:30') );
		$st->execute( array( 'id_sport'=>'1', 'ime_kluba' => 'Krka', 'grad' => 'Šibenik', 'drzava' => 'Hrvatska', '1x SŽ' => '9:09', '2x SŽ' => '', '1x SM' => '8', '2x SM' => '6') );
		$st->execute( array( 'id_sport'=>'1', 'ime_kluba' => 'Mladost', 'grad' => 'Zagreb', 'drzava' => 'Hrvatska', '1x SŽ' => '10:20', '2x SŽ' => '8:50', '1x SM' => '8:10', '2x SM' => '6:30') );
		$st->execute( array( 'id_sport'=>'1', 'ime_kluba' => 'Trešnjevka', 'grad' => 'Zagreb', 'drzava' => 'Hrvatska', '1x SŽ' => '9:48', '2x SŽ' => '8:20', '1x SM' => '8:01', '2x SM' => '6:45') );
		$st->execute( array( 'id_sport'=>'1', 'ime_kluba' => 'Iktus', 'grad' => 'Osijek', 'drzava' => 'Hrvatska', '1x SŽ' => '10:20', '2x SŽ' => '8:15', '1x SM' => '8:05', '2x SM' => '6:30') );
		$st->execute( array( 'id_sport'=>'1', 'ime_kluba' => 'Vukovar', 'grad' => 'Vukovar', 'drzava' => 'Hrvatska', '1x SŽ' => '10', '2x SŽ' => '7:35', '1x SM' => '7:55', '2x SM' => '5:50') );

		
	}
	catch( PDOException $e ) { exit( "PDO error [klub]: " . $e->getMessage() ); }

	echo "Ubacio u tablicu klub.<br />";
}

function seed_table_trener()
{
	$db = DB::getConnection();

	// Ubaci neke prodaje unutra (ovo nije bas pametno ovako raditi, preko hardcodiranih id-eva usera i proizvoda)
	try
	{
		$st = $db->prepare( 'INSERT INTO trener(username, password_hash, ime, prezime, id_klub, registration_sequence, has_registered) VALUES (:username, :password, :ime, :prezime, :id_klub, \'abc\', \'1\')' );
		
		$st->execute( array( 'username' => 'vujo', 'password' => password_hash( 'vujinasifra', PASSWORD_DEFAULT ), 'ime' => 'Branimir', 'prezime' => 'Vujević', 'id_klub'=>'1' ) );
		$st->execute( array( 'username' => 'bajlo', 'password' => password_hash( 'bajlovasifra', PASSWORD_DEFAULT ), 'ime' => 'Danijel', 'prezime' => 'Bajlo', 'id_klub'=>'1' ) );
		$st->execute( array( 'username' => 'tale', 'password' => password_hash( 'talinaifra', PASSWORD_DEFAULT ), 'ime' => 'Denis', 'prezime' => 'Boban', 'id_klub'=>'2' ) );
		$st->execute( array( 'username' => 'mime', 'password' => password_hash( 'miminasifra', PASSWORD_DEFAULT ), 'ime' => 'Milan', 'prezime' => 'Radečić', 'id_klub'=>'3' ) );
		$st->execute( array( 'username' => 'brale', 'password' => password_hash( 'bralinasifra', PASSWORD_DEFAULT ), 'ime' => 'Nikola', 'prezime' => 'Bralić', 'id_klub'=>'4' ) );
		$st->execute( array( 'username' => 'urlic', 'password' => password_hash( 'urlicevasifra', PASSWORD_DEFAULT ), 'ime' => 'Toni', 'prezime' => 'Urlić', 'id_klub'=>'4' ) );
		$st->execute( array( 'username' => 'sale', 'password' => password_hash( 'salinasifra', PASSWORD_DEFAULT ), 'ime' => 'Aleksandar', 'prezime' => 'Vukojčić', 'id_klub'=>'5' ) );
		$st->execute( array( 'username' => 'kempes', 'password' => password_hash( 'kempinasifra', PASSWORD_DEFAULT ), 'ime' => 'Krešimir', 'prezime' => 'Petrović', 'id_klub'=>'5' ) );
		$st->execute( array( 'username' => 'izak', 'password' => password_hash( 'izakovasifra', PASSWORD_DEFAULT ), 'ime' => 'Krešimir', 'prezime' => 'Ižak', 'id_klub'=>'6' ) );
		$st->execute( array( 'username' => 'dzalto', 'password' => password_hash( 'dzaltinaifra', PASSWORD_DEFAULT ), 'ime' => 'Krešimir', 'prezime' => 'Džalto', 'id_klub'=>'7' ) );

		}
	catch( PDOException $e ) { exit( "PDO error [trener]: " . $e->getMessage() ); }

	echo "Ubacio u tablicu trener.<br />";
}
function seed_table_sportas()

{
	$db = DB::getConnection();

	// Ubaci neke korisnike unutra
	try
	{
		$st = $db->prepare( 'INSERT INTO sportas(username, password_hash, ime, prezime, datum_rodenja, kategorija,  id_trener, id_klub, registration_sequence, has_registered) VALUES (:username, :password, :ime, :prezime, :datum_rodenja, :kategorija, :id_trener, :id_klub, \'abc\', \'1\')' );

		$st->execute( array( 'username' => 'elazuva', 'password' => password_hash( 'elinasifra', PASSWORD_DEFAULT ), 'ime' => 'Ela', 'prezime' => 'Žuvanić', 'datum_rodenja' => '2000-03-25', 'kategorija'=>'seniorke', 'id_trener' => '2', 'id_klub'=>'1' ) );
		$st->execute( array( 'username' => 'saric123', 'password' => password_hash( 'sarinasifra', PASSWORD_DEFAULT ), 'ime' => 'Sara', 'prezime' => 'Žuvanić', 'datum_rodenja' => '2004-03-11', 'kategorija'=>'seniorke', 'id_trener' => '2', 'id_klub'=>'1' ) );
		
	}
	catch( PDOException $e ) { exit( "PDO error [insert sportas]: " . $e->getMessage() ); }

	echo "Ubacio u tablicu sportas.<br />";
}

?> 
 
 