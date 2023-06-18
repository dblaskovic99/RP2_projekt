<?php
    class Trening{

            protected $id_trening, $id_sportas, $vrsta, $ime, $intreval1, $rez_interval1, $intreval2, $rez_interval2, $intreval3, $rez_interval3, $intreval4, $rez_interval4, $intreval5, $rez_interval5, $intreval6, $rez_interval6, $intreval7, $rez_interval7, $intreval8, $rez_interval8, $intreval9, $rez_interval9, $intreval10, $rez_interval10;

            function __construct($id_trening, $id_sportas, $vrsta, $ime, $intreval1, $rez_interval1, $intreval2, $rez_interval2, $intreval3, $rez_interval3, $intreval4, $rez_interval4, $intreval5, $rez_interval5, $intreval6, $rez_interval6, $intreval7, $rez_interval7, $intreval8, $rez_interval8, $intreval9, $rez_interval9, $intreval10, $rez_interval10 )
            {
                $this->id_trening=$id_trening;
                $this->id_sportas=$id_sportas;
                $this->vrsta=$vrsta;
                $this->ime=$ime;
                $this->intreval1=$intreval1;     
                $this->rez_interval1=$rez_interval1;
                $this->intreval2=$intreval2;     
                $this->rez_interval2=$rez_interval2;
                $this->intreval3=$intreval3;     
                $this->rez_interval3=$rez_interval3;
                $this->intreval4=$intreval4;     
                $this->rez_interval4=$rez_interval4;
                $this->intreval5=$intreval5;     
                $this->rez_interval5=$rez_interval5;
                $this->intreval6=$intreval6;     
                $this->rez_interval6=$rez_interval6;
                $this->intreval7=$intreval7;     
                $this->rez_interval7=$rez_interval7;
                $this->intreval8=$intreval8;     
                $this->rez_interval8=$rez_interval8;
                $this->intreval9=$intreval9;     
                $this->rez_interval9=$rez_interval9;
                $this->intreval10=$intreval10;     
                $this->rez_interval10=$rez_interval10;
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