<?php
    class Klub{

            protected $id_klub, $id_sport, $ime_kluba, $grad, $drzava;

            function __construct($id_klub, $id_sport, $ime_kluba, $grad, $drzava)
            {
                $this->id_klub=$id_klub;
                $this->id_sport=$id_sport;
                $this->ime_kluba=$ime_kluba;
                $this->grad=$grad;
                $this->drzava=$drzava;                
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