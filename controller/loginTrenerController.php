<?php 

class LoginTrenerController extends BaseController
{
	public function index() 
	{
		// Analizira $_POST iz forme za login

		$rs = new Service();
		if( !isset( $_POST['username'] ) || !isset( $_POST['password'] ) )
		{
			$this->registry->template->title = 'Unesite korisničko ime i lozinku.';
			$this->registry->template->show( 'loginTrener_index' );
		}
		else if( !preg_match( '/^[a-zA-Z]{3,10}$/', $_POST['username'] ) )
		{
			$this->registry->template->title = 'Korisničko ime mora sadržavati od 3 do 10 znakova.';
			$this->registry->template->show( 'loginTrener_index' );
		}
		else
		{
			// Dakle dobro je korisničko ime. 
			// Provjeri taj korisnik postoji u bazi; dohvati njegove ostale podatke.
			$trener = $rs->getTrenerPoUsername( $_POST['username'] );
			if( $trener === null )
			{
				$this->registry->template->title = 'Korisnik s ovim korisničkim imenom ne postoji.';
				$this->registry->template->show( 'loginTrener_index' );
			}
			else if( $trener->has_registered === '0' )
			{
				$this->registry->template->title = 'Korisnik s ovim e-mailom nije registriran. Provjerite svoj e-mail.';
				$this->registry->template->show( 'loginTrener_index' );	
			}
			else if( !password_verify( $_POST['password'], $trener->password_hash ) )
			{
				$this->registry->template->title = 'Netočna lozinka.';
				$this->registry->template->show( 'loginTrener_index' );
			}
			else
			{
				// Sad je valjda sve OK. Ulogiraj ga.
				$_SESSION['username'] = $_POST['username'];
                $_SESSION['id_trener']= $trener-> id_trener;
				


				$this->registry->template->title = 'Uspješna prijava!';
				$this->registry->template->show( 'logged_inTrener' );
			}
		}
	}

}; 

?>