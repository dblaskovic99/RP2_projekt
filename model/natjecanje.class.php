<?php
    class Natjecanje{

            protected $id_natjecanje, $id_sportas, $datum, $vrijeme, $ime, $lokacija, $disciplina;

            function __construct($id_natjecanje, $id_sportas, $datum, $vrijeme, $ime, $lokacija, $disciplina)
            {
                $this->id_natjecanje=$id_natjecanje;
                $this->id_sportas=$id_sportas;
                $this->datum=$datum;
                $this->vrijeme=$vrijeme;
                $this->ime=$ime;      
                $this->lokacija=$lokacija;  
                $this->disciplina=$disciplina;  
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