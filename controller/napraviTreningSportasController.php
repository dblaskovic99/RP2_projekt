<?php 

class napraviTreningSportasController extends BaseController
{
	public function index() 
	{
		
    
        $ls = new Service();
        $i=0;
        if(isset($_POST['rez_interval1'][$i])){
            $trening=$ls->getTreningPoID($_GET['id_trening']);
            $ls->napraviTrening(
                $trening,
                $_POST['rez_interval1'],
                $_POST['rez_interval2'],
                $_POST['rez_interval3'],
                $_POST['rez_interval4'],
                $_POST['rez_interval5'],
                $_POST['rez_interval6'],
                $_POST['rez_interval7'],
                $_POST['rez_interval8'],
                $_POST['rez_interval9'],
                $_POST['rez_interval10']
            );

            // Redirect to the sportas_index page
            header("Location: " . __SITE_URL . "/index.php?rt=treningSportas" );
            exit();
        }
            
        
        else {
            $ls = new Service();

            // Popuni template potrebnim podacima
            $this->registry->template->title = 'Popis svih sportaša';
            $this->registry->template->treningList = $ls->getTreningPoID($_GET['id_trening']);
    
            $this->registry->template->show( 'novitreningSportas_index' );       
         }
        }
    }
        
        

		
	
    

?>