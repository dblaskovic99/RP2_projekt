<?php
    class Sportas{

            protected $id_sportas, $username, $password_hash, $ime, $prezime, $datum_rodenja, $kategorija, $id_trener, $id_klub, $registration_sequence, $has_registered ;

            function __construct($id_sportas, $username, $password_hash, $ime, $prezime, $datum_rodenja, $kategorija, $id_trener, $id_klub, $registration_sequence, $has_registered )
            {
                $this->id_sportas=$id_sportas;
                $this->username=$username;
                $this->password_hash=$password_hash;
                $this->ime=$ime;
                $this->prezime=$prezime;     
                $this->datum_rodenja=$datum_rodenja;
                $this->kategorija=$kategorija;
                $this->id_trener=$id_trener;
                $this->id_klub=$id_klub;
                $this->registration_sequence=$registration_sequence;
                $this->has_registered=$has_registered;
           
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