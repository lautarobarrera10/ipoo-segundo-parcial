<?php

class PartidoFutbol extends Partido {
    // Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) .  A continuación se presenta una tabla en la que se detalla los valores por defecto de cada  coeficiente aplicado a una categoría de un partido  fútbol: 
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }

    public function getCoefMenores(){
        return $this->coefMenores;
    }

    public function setCoefMenores($value){
        $this->coefMenores = $value;
    }

    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }

    public function setCoefJuveniles($value){
        $this->coefJuveniles = $value;
    }

    public function getCoefMayores(){
        return $this->coefMayores;
    }

    public function setCoefMayores($value){
        $this->coefMayores = $value;
    }


    public function coeficientePartido(){
        $cantidadGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantidadJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();

        $categoriaPartido = parent::getObjEquipo1()->getObjCategoria()->getDescripcion();
        $coef = parent::getCoefBase();
        switch ($categoriaPartido) {
            case "menores":
                $coef = $this->getCoefMenores();
                break;
            case "juveniles":
                $coef = $this->getCoefJuveniles();
                break;
            case "mayores":
                $coef = $this->getCoefMayores();
                break;
        }
        return $coef * $cantidadGoles * $cantidadJugadores;
    }
}