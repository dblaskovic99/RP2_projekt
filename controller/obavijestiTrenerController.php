<?php 
require_once __DIR__ . '/../model/service.class.php';

class obavijestiTrenerController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih poruka trenera
		//Tu može objaviti novi post
		$rs = new Service();
		$list = $rs->sveObavijestiTrener($_SESSION['id_trener']);

		require_once __DIR__ . '/../view/obavijestiTrener_index.php';

	}
    public function dodajObavijest()
    {
        if(isset($_POST['novaobavijest']))
        {
            $service = new Service();
            $service->novaObavijest($_SESSION['id_trener'], $_POST['novaobavijest']);

            // Redirect user back to their quacks page
            header('Location: index.php?rt=obavijestiTrener/index');
        }
    }
}
?>