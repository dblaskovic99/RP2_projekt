<?php 

class obavijestiSportasController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih poruka trenera
		//Tu može objaviti novi post
		$rs = new Service();
		$list = $rs->obavijestiSportas($_SESSION['id_sportas']);

		require_once __DIR__ . '/../view/obavijestiSportas_index.php';

	}

	public function dodajKomentar() 
    {
        if(isset($_POST['komentar'], $_POST['id_obavijesti']))
        {
            $service = new Service();
            $service->noviKomentar($_POST['id_obavijesti'], $_SESSION['username'], $_POST['komentar']);

            header('Location: index.php?rt=obavijestiSportas/index');
        }
    }
}
?>