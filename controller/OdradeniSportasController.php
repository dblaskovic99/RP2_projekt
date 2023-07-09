<?php 

class OdradeniSportasController extends BaseController
{
	public function index() 
	{

        
            $ls = new Service();
            $sportas=$ls->getSportasPoUsername($_SESSION['username']);
            $id_sportas=$sportas->id_sportas;
            // Popuni template potrebnim podacima
            $this->registry->template->treningList= $ls->getTreningPoSportasOdradeni($id_sportas);


    
            $this->registry->template->show( 'odradeniSportas_index' );


        
	}
}
?>