<?php

class EstanteriasBackup extends Estanterias{

    private $fecha_salida;
    
    private $motivo;
    
    function __construct($nLejas, $nPosi, $codigo, $material, $pasillo, $nLejasOcupadas, $fecha_alta,$fecha_salida, $motivo) {
    parent::__construct($nLejas, $nPosi, $codigo, $material, $pasillo, $nLejasOcupadas, $fecha_alta);
        $this->fecha_salida = $fecha_salida;
        $this->motivo = $motivo;
    }
    
    function getFecha_salida() {
        return $this->fecha_salida;
    }

    function getMotivo() {
        return $this->motivo;
    }

    function setFecha_salida($fecha_salida) {
        $this->fecha_salida = $fecha_salida;
    }

    function setMotivo($motivo) {
        $this->motivo = $motivo;
    }

    public function __toString() {
        parent::__toString().$this->getFecha_salida().$this->getMotivo();
    }
    
}
