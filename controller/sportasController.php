<?php 

class SportasController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje popis svih sportaša
        if(isset($_GET['username'])){
            $ls = new Service();

            // Popuni template potrebnim podacima
            $this->registry->template->title = 'Popis svih sportaša';
            $this->registry->template->sportas= $ls->getSportasPoUsername($_GET['username']);
    
            $this->registry->template->show( 'sportas_index' );
        }
		
	}
}
?>