<?php 

class kalendarSportasController extends BaseController
{
	public function index() 
	{
        $ls = new Service();

		$sportas=$ls->getSportasPoUsername($_SESSION['username']);
		$id_sportas=$sportas->id_sportas;

        // Kontroler koji prikazuje kalendar natjecanja i treninga
		 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             
            if (isset($_POST['prevMonth'], $_POST['prevYear']) && isset($_POST['previous'])) {
                $currentMonth = $_POST['prevMonth'];
                $currentYear = $_POST['prevYear'];
             }

            elseif (isset($_POST['nextMonth'], $_POST['nextYear']) && isset($_POST['next'])) {
                $currentMonth = $_POST['nextMonth'];
                $currentYear = $_POST['nextYear']; 
            }
        } 
        
        else {
        // Inaèe postavljamo trenutni mjesec i godinu
            $currentDate = strtotime(date('Y-m-d'));
            $currentMonth = date('m', $currentDate);
            $currentYear = date('Y', $currentDate);
        }
        
        // Popuni template potrebnim podacima
		$this->registry->template->sviTreninziList = $ls->getSveTreninge($id_sportas);
        $this->registry->template->svaNatjecanjaList = $ls->getBuducaNatjecanja($id_sportas);
        $this->registry->template->month = $currentMonth;
        $this->registry->template->year = $currentYear;
		$this->registry->template->title = 'Kalendar dogaðaja.';
		$this->registry->template->show( 'kalendarSportas_index' );
	}
    

}
?>