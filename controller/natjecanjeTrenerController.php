<?php 
class natjecanjeTrenerController extends BaseController
{
    public function index(){
        $ls = new Service();
        $i=0;
        while(isset($_POST['sportasi'][$i])) {
            if (isset($_POST['datum']) && isset($_POST['ime'])) {
                $sportas = $ls->getSportasPoUsername($_POST['username'][$i]); // changed from 0 to $i
                $id_sportas = $sportas->id_sportas;
                
                
                $ls->dodajNatjecanjeTrener($id_sportas, $_POST['datum'], $_POST['ime'], $_POST['lokacija'], $_POST['disciplina']);

            } 
            $i++; // increment $i
        }
        
        if ($i == 0) { // if $i is still 0, no usernames were provided
            $ls = new Service();

            // Popuni template potrebnim podacima
            $this->registry->template->title = 'Popis svih sportaša';
            $this->registry->template->sportasList = $ls->getSviSportasi($_SESSION['id_trener']);

            $this->registry->template->show( 'novonatjecanjeTrener_index' );       
        } else {
            // Redirect to the sportas_index page
            header("Location: " . __SITE_URL . "/index.php?rt=svisportasiTrener");
            exit();
    }
}

}
?>