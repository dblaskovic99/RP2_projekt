<?php 

class SportasTrenerController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih sportaša
        if(isset($_GET['username'])){
            $ls = new Service();

            // Popuni template potrebnim podacima
            $this->registry->template->title = 'Popis svih sportaša';
            $this->registry->template->sportas= $ls->getSportasPoUsername($_GET['username']);

            $ls = new Service();
            $sportas=$ls->getSportasPoUsername($_GET['username']);
            $id_sportas=$sportas->id_sportas;
            // Popuni template potrebnim podacima
            $this->registry->template->title = 'Popis svih sportaša';
            $this->registry->template->treningList= $ls->getTreningPoSportasOdradeni($id_sportas);
            $this->registry->template->treningListNeodradeni= $ls->getNeodradeneTreninge($id_sportas);
            $this->registry->template->max500m= $ls->getMax500m($id_sportas);
            $this->registry->template->max1000m= $ls->getMax1000m($id_sportas);
            $this->registry->template->max2000m= $ls->getMax2000m($id_sportas);
            $this->registry->template->max6000m= $ls->getMax6000m($id_sportas);
            $this->registry->template->max30min= $ls->getMax30min($id_sportas);

    
            $this->registry->template->show( 'sportasTrener_index' );


        }
	}
}
?>