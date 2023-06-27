<?php 

class napraviTreningSportasController extends BaseController
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
            $this->registry->template->treningList= $ls->getTreningPoSportas($id_sportas);
    
            $this->registry->template->show( 'sportasTrener_index' );


        }
        

		
	}
    
}
?>