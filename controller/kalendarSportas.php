<?php 

class kalendarSportasController extends BaseController
{
	public function index() 
	{
		// Kontroler koji prikazuje kalendar natjecanja i trening

        $this->registry->template->show( 'kalendarSportas_index' );
	}
}
?>