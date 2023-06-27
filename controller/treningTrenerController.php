<?php 
class treningTrenerController extends BaseController
{
    public function index()
    {
        $ls = new Service();
        $i=0;
        if(isset($_POST['username'][$i])){
            while(isset($_POST['username'][$i])){
                if (isset($_POST['vrsta']) && isset($_POST['ime']) && isset($_POST['interval1'])) {
                    $sportas = $ls->getSportasPoUsername($_POST['username'][0]);
                    $id_sportas = $sportas->id_sportas;
                    $ls->dodajTreningTrener(
                        $id_sportas,
                        $_POST['vrsta'],
                        $_POST['ime'],
                        $_POST['interval1'],
                        $_POST['interval2'],
                        $_POST['interval3'],
                        $_POST['interval4'],
                        $_POST['interval5'],
                        $_POST['interval6'],
                        $_POST['interval7'],
                        $_POST['interval8'],
                        $_POST['interval9'],
                        $_POST['interval10']
                    );
        
                    // Redirect to the sportas_index page
                    header("Location: " . __SITE_URL . "/index.php?rt=sportasTrener&username=" . $sportas->username);
                    exit();
                } else {
                    $ls = new Service();
        
                    // Popuni template potrebnim podacima
                    $this->registry->template->title = 'Popis svih sportaša';
                    $this->registry->template->sportasList = $ls->getSviSportasi($_SESSION['id_trener']);
            
                    $this->registry->template->show( 'novitreningTrener_index' );       
                 }
            }
        }
        else {
            $ls = new Service();

            // Popuni template potrebnim podacima
            $this->registry->template->title = 'Popis svih sportaša';
            $this->registry->template->sportasList = $ls->getSviSportasi($_SESSION['id_trener']);
    
            $this->registry->template->show( 'novitreningTrener_index' );       
         }
        
    }
}

?>