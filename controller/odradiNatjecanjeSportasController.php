<?php 

class odradiNatjecanjeSportasController extends BaseController
{
	public function index() 
    {
        $ls = new Service();
        if(isset($_POST['rezultat'])){
            $id_natjecanje = $_GET['id_natjecanje'];
            $noviRezultat = $_POST['rezultat'];
            // Zapisivanje rezultata natjecanja u bazu
            $ls->odradiNatjecanje($id_natjecanje, $noviRezultat);

            $natjecanje = $ls->getNatjecanjePoID($id_natjecanje);
            $sportas = $ls->getSportasPoUsername($_SESSION['username']);
            $klub_id = $sportas->id_klub;
            $klub = $ls->getKlubByID($klub_id);
            
            list($noveMinute, $noveSekunde) = explode(':', $noviRezultat);

            // Provjera discipline natjecanja
            $disciplina = $natjecanje[0]['disciplina'];

            // Provjera jeli uenseni rezultat klupski rekord
            switch ($disciplina) {
                case '1x SZ':
                    $trenutniRezultat = $klub['1x SZ'];
                    list($trenutneMinute, $trenutneSekunde) = explode(':', $trenutniRezultat);
                    if ($noveMinute < $trenutneMinute) {
                        $ls->azuriraj1xSZ($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 1x SZ!';
                    }

                    else if ($noveMinute == $trenutneMinute && $noveSekunde < $trenutneSekunde) {
                        $ls->azuriraj1xSZ($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 1x SZ!';
                    }
                    break;
                case '2x SZ':
                      $trenutniRezultat = $klub['2x SZ'];
                      list($trenutneMinute, $trenutneSekunde) = explode(':', $trenutniRezultat);
                      if ($noveMinute < $trenutneMinute) {
                        $ls->azuriraj2xSZ($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 2x SZ!';
                    }

                    else if ($noveMinute == $trenutneMinute && $noveSekunde < $trenutneSekunde) {
                        $ls->azuriraj2xSZ($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 2x SZ!';
                    }
                    break;
                case '1x SM':
                    $trenutniRezultat = $klub['1x SM'];
                    list($trenutneMinute, $trenutneSekunde) = explode(':', $trenutniRezultat);
                      if ($noveMinute < $trenutneMinute) {
                        $ls->azuriraj1xSM($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 1x SM!';
                    }

                    else if ($noveMinute == $trenutneMinute && $noveSekunde < $trenutneSekunde) {
                       $ls->azuriraj1xSM($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 1x SM!';
                    }
                    break;
                case '2x SM':
                    $trenutniRezultat = $klub['2x SM'];
                    list($trenutneMinute, $trenutneSekunde) = explode(':', $trenutniRezultat);
                      if ($noveMinute < $trenutneMinute) {
                        $ls->azuriraj2xSM($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 2x SM!';
                    }

                    else if ($noveMinute == $trenutneMinute && $noveSekunde < $trenutneSekunde) {
                        $ls->azuriraj2xSM($klub_id, $noviRezultat);
                        $this->registry->template->popup = 1;
                        $this->registry->template->natpis = 'Oboren klupski rekord u disciplini 2x SM!';
                    }
                    break;
                default:
                    break;
            }

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