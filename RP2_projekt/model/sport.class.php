<?php
    class Sport{

            protected $id_sport, $ime_sporta;

            function __construct($id_sport, $ime_sporta)
            {
                $this->id_sport=$id_sport;
                $this->ime_sporta=$ime_sporta;
              
            }

            function __get($property)
            {
                if( property_exists( $this, $property ) )
                 return $this->$property;
            }

            function __set($property, $value)
            {
                if( property_exists( $this, $property) )
                 $this->$property = $value;
                
                return $this;                
            }
    };

?>