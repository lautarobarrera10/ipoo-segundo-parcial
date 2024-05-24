<?php

class Torneo {
    // Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del premio. Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.

    private $colPartidos;
    private $importePremio;

    public function __construct(float $importePremio){
        $this->importePremio = $importePremio;
        $this->colPartidos = [];
    }

    public function getColPartidos(){
        return $this->colPartidos;
    }

    public function setColPartidos(array $value){
        $this->colPartidos = $value;
    }

    public function getImportePremio(){
        return $this->importePremio;
    }

    public function setImportePremio(float $value){
        $this->importePremio = $value;
    }

    public function __toString(){
        $partidos = $this->getColPartidos();
        $stringPartidos = "";
        foreach ($partidos as $partido){
            $stringPartidos .= $partido;
        }
        return
        "Importe de premio: $" . $this->getImportePremio() . "\n" .
        "Partidos: " . $stringPartidos . "\n";
    }

    public function ingresarPartido(Equipo $OBJEquipo1, Equipo $OBJEquipo2, $fecha, string $tipoPartido) {
        // Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.

        $mismaCategoria = $OBJEquipo1->getObjCategoria() == $OBJEquipo2->getObjCategoria();
        $mismaCantidadJugadores = $OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores();
        $tipoPartidoCorreto = $tipoPartido == "basquet" || $tipoPartido == "futbol";

        $partidoCorrecto = false;
        $partido = null;

        if ($mismaCategoria && $mismaCantidadJugadores && $tipoPartidoCorreto){
            $partidoCorrecto = true;
            switch ($tipoPartido) {
                case "basquet":
                    $partido = new PartidoBasquet(1, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
                    break;
                case "futbol":
                    $partido = new PartidoFutbol(2, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
                    break;
            }
        }

        if ($partidoCorrecto) {
            // Actualizamos la colección de partidos
            $colPartidos = $this->getColPartidos();
            array_push($colPartidos, $partido);
            $this->setColPartidos($colPartidos);
        }

        return $partido;
    }
}