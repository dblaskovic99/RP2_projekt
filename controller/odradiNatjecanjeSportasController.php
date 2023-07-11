<?php 

class odradiNatjecanjeSportasController extends BaseController
{
	public function index() 
	{
		
        $ls = new Service();
        if(isset($_POST['rezultat'])){
            $id_natjecanje=$_GET['id_natjecanje'];
            $ls->odradiNatjecanje(
                $id_natjecanje,
                $_POST['rezultat']
            );
        }
            
            $sportas=$ls->getSportasPoUsername($_SESSION['username']);
		    $id_sportas=$sportas->id_sportas;
            // Popuni template potrebnim podacima
            $this->registry->template->title = 'Buduæa natjecanja';
            $this->registry->template->natjecanjaList = $ls->getBuducaNatjecanja($id_sportas);
            $this->registry->template->show( 'natjecanjaSportas_index' );       
    }
}
        
?>