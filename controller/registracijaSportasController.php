<?php 

class RegistracijaSportasController extends BaseController
{
	public function index() 
	{
		// Analizira $_POST iz forme za stvaranje novog korisnika

		$rs = new Service();
        if( !isset( $_POST['username'] ) || !isset( $_POST['password'] ) )
        {
            $this->registry->template->title = 'Unesite korisnièko ime i lozinku';
            $this->registry->template->kluboviList = $rs->generirajKlubove();
			$this->registry->template->show( 'registracijaSportas_index' );

        }
        else if( !preg_match( '/^[A-Za-z]{3,10}$/', $_POST['username'] ) )
        {
            $this->registry->template->title = 'Korisnièko ime mora imati izmeðu 3 i 10 znakova.';
            $this->registry->template->kluboviList = $rs->generirajKlubove();
			$this->registry->template->show( 'registracijaSportas_index' );
        }
        
        else
        {
            // Provjeri jel veæ postoji taj korisnik u bazi
            $user = $rs->getSportasPoUsername( $_POST['username'] );
            
            if( $user !== null )
            {
                $this->registry->template->title = 'Taj korisnik veæ postoji';
                $this->registry->template->kluboviList = $rs->generirajKlubove();
                $this->registry->template->show( 'registracijaSportas_index' );
            }
            else
            {
                // Dakle sad je napokon sve ok.
                // Dodaj novog korisnika u bazu. Prvo mu generiraj random string od 10 znakova za registracijski link.
                $reg_seq = '';
                for( $i = 0; $i < 20; ++$i )
                    $reg_seq .= chr( rand(0, 25) + ord( 'a' ) ); // Zalijepi sluèajno odabrano slovo
                switch ($_POST['kategorija']) {
                    case 1:
                        $kategorija = 'kadet';
                        break;
                    case 2:
                        $kategorija = 'junior';
                        break;
                    case 3:
                        $kategorija = 'senior';
                        break;
                    case 4:
                        $kategorija = 'veteran';
                        break;
                }
                $treneri = $rs->getTrenerpoKlubu($_POST['id_klub']);
                $trener_id = $treneri[0]['id_trener'];

                $rs->dodajNovogSportasa( $_POST['username'], $_POST['password'], $_POST['ime'], $_POST['prezime'], $_POST['datum'], $kategorija, $trener_id, $_POST['id_klub'], $reg_seq );

                $_SESSION['username'] = $_POST['username'];
                $sportas = $rs->getSportasPoUsername( $_POST['username'] );
                $_SESSION['id_sportas']= $sportas->id_sportas;

                // Zahvali mu na prijavi.
                $this->registry->template->title = 'Hvala Vam na registraciji!';
                $this->registry->template->show( 'logged_inSportas' );
            }
        }
    }
}
?>