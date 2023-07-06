<?php 

class obavijestiSportasController extends BaseController
{
	public function index() 
	{
		header( 'Location: index.php?rt=obavijestiSportas' );
        exit;
	}
}
?>