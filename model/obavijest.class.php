<?php

class Obavijest
{
    protected $id, $id_trener, $obavijest, $date;

    function __construct( $id, $id_trener, $obavijest, $date)
	{
		$this->id = $id;
		$this->id_user = $id_trener;
		$this->quack = $obavijest;
        $this->date = $date;

	}


    function __get( $property ) { 
		if (property_exists($this, $property))
			return $this->$property;
	 }
	function __set( $property, $value ) {
		if (property_exists($this, $property))
			$this->$property = $value;
		return $this;
	 }
    
}
?>
