<?php

class PartidoBasquet extends Partido {
    // Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad de infracciones de manera tal que al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. Es decir: coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);

    private $coefPenalizacion;
    private $cantidadInfracciones;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefPenalizacion = 0.75;
        $this->cantidadInfracciones = 0;
    }

    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }

    public function setCoefPenalizacion($value){
        $this->coefPenalizacion = $value;
    }

    public function getCantidadInfracciones(){
        return $this->cantidadInfracciones;
    }

    public function setCantidadInfracciones($value){
        $this->cantidadInfracciones = $value;
    }

    public function coeficientePartido(){
        $coeficienteBasePartido = parent::coeficientePartido();
        $coefPenalizacion = $this->getCoefPenalizacion();
        $cantidadInfracciones = $this->getCantidadInfracciones();

        $coef = $coeficienteBasePartido - ($coefPenalizacion * $cantidadInfracciones);
        return $coef;
    }
}