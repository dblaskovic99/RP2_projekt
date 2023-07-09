<?php 

class natjecanjaSportasController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih sportaša

		$ls = new Service();
		$sportas=$ls->getSportasPoUsername($_SESSION['username']);
		$id_sportas=$sportas->id_sportas;
		// Popuni template potrebnim podacima
		$this->registry->template->natjecanjaList = $ls->getBuducaNatjecanja($id_sportas);
		
        $this->registry->template->show( 'natjecanjaSportas_index' );
	}
}
?>