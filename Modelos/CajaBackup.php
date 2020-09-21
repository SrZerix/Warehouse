<?php

class CajaBackup extends Cajas{
    
    private $id;
    private $idestanteria;
    private $leja;
    private $fecha_salida;
 
   function __construct($codigo, $material, $contenido, $color, $alto, $ancho, $profundidad, $fecha_alta,$idestanteria,$leja,$fecha_salida) {
      parent::__construct($codigo, $material, $contenido, $color, $alto, $ancho, $profundidad, $fecha_alta);
        $this->setIdestanteria($idestanteria);
        $this->setLeja($leja);
        $this->setFecha_salida($fecha_salida);
  }

  function getIdestanteria() {
      return $this->idestanteria;
  }

  function getId() {
      return $this->id;
  }

  function getId_estanteria() {
      return $this->idestanteria;
  }

  function getLeja() {
      return $this->leja;
  }

  function getFecha_salida() {
      return $this->fecha_salida;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setIdestanteria($idestanteria) {
      $this->idestanteria = $idestanteria;
  }

  function setLeja($leja) {
      $this->leja = $leja;
  }

  function setFecha_salida($fecha_salida) {
      $this->fecha_salida = $fecha_salida;
  }

    
}