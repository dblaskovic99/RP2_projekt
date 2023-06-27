<?php 

class RegistracijaTrenerController extends BaseController
{
	public function index() 
	{
		// Analizira $_POST iz forme za stvaranje novog korisnika

		$rs = new Service();
        if( !isset( $_POST['username'] ) || !isset( $_POST['password'] ) )
        {
            $this->registry->template->title = 'Unesite korisničko ime i lozinku';
			$this->registry->template->show( 'registracijaTrener_index' );
        }
        else if( !preg_match( '/^[A-Za-z]{3,10}$/', $_POST['username'] ) )
        {
            $this->registry->template->title = 'Korisničko ime mora imati između 3 i 10 znakova.';
			$this->registry->template->show( 'registracijaTrener_index' );
        }
        
        else
        {
            // Provjeri jel već postoji taj korisnik u bazi
            $user = $rs->getTrenerPoUsername( $_POST['username'] );
            
            if( $user !== null )
            {
                $this->registry->template->title = 'Taj korisnik već postoji';
                $this->registry->template->show( 'registracijaTrener_index' );
            }
            else
            {
                // Dakle sad je napokon sve ok.
                // Dodaj novog korisnika u bazu. Prvo mu generiraj random string od 10 znakova za registracijski link.
                $reg_seq = '';
                for( $i = 0; $i < 20; ++$i )
                    $reg_seq .= chr( rand(0, 25) + ord( 'a' ) ); // Zalijepi slučajno odabrano slovo

                $rs->dodajNovogTrenera( $_POST['username'], $_POST['password'], $_POST['ime'], $_POST['prezime'], $_POST['id_klub'], $reg_seq );

                $_SESSION['username'] = $_POST['username'];
                $trener = $rs->getTrenerPoUsername( $_POST['username'] );
                $_SESSION['id_trener']= $trener-> id_trener;

                // Zahvali mu na prijavi.
                $this->registry->template->title = 'Hvala Vam na registraciji!';
                $this->registry->template->show( 'loggedTrener_in' );
            }
        }
    }
}
?>