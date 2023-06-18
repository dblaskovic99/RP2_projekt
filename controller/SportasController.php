<?php 

class SportasController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih sportaša

		$ls = new Service();

		// Popuni template potrebnim podacima
		$this->registry->template->title = 'Popis svih sportaša';
		$this->registry->template->sportas = $ls->getSportasPoUsername($username);

        $this->registry->template->show( 'sportas_index' );
	}
}
?>