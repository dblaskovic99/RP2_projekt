<?php 

class treningSportasController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih sportaša

		$ls = new Service();
		$sportas=$ls->getSportasPoUsername($_SESSION['username']);
		$id_sportas=$sportas->id_sportas;
		// Popuni template potrebnim podacima
		$this->registry->template->treningList = $ls->getNeodradeneTreninge($id_sportas);
		$this->registry->template->max500m= $ls->getMax500m($id_sportas);
		$this->registry->template->max1000m= $ls->getMax1000m($id_sportas);
		$this->registry->template->max2000m= $ls->getMax2000m($id_sportas);
		$this->registry->template->max6000m= $ls->getMax6000m($id_sportas);
		$this->registry->template->max30min= $ls->getMax30min($id_sportas);
		
        $this->registry->template->show( 'pocetnaSportas_index' );
	}
}
?>