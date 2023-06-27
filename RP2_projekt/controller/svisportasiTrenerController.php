<?php 

class SvisportasiTrenerController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih sportaša

		$ls = new Service();

		// Popuni template potrebnim podacima
		$this->registry->template->title = 'Popis svih sportaša';
		$this->registry->template->sportasList = $ls->getSviSportasi($_SESSION['id_trener']);

        $this->registry->template->show( 'svisportasiTrener_index' );
	}
}
?>