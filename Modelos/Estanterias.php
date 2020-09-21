<?php

class Estanterias{
    private $nLejas;
    private $nPosi;
    private $codigo;
    private $material;
    private $pasillo;
    private $nLejasOcupadas;
    private $id;
    private $fechaAlta;
    
  function __construct($nLejas, $nPosi, $codigo, $material, $pasillo, $nLejasOcupadas, $fechaAlta) {
        $this->setNLejas($nLejas);
        $this->setNPosi($nPosi);
        $this->setCodigo($codigo);
        $this->setMaterial($material);
        $this->setPasillo($pasillo);
        $this->setNLejasOcupadas($nLejasOcupadas);
        $this->setFechaAlta($fechaAlta);
       
  }
  
  function getNLejasOcupadas() {
      return $this->nLejasOcupadas;
  }

  function getId() {
      return $this->id;
  }

  function getFechaAlta() {
      return $this->fechaAlta;
  }

  function setNLejasOcupadas($nLejasOcupadas) {
      $this->nLejasOcupadas = $nLejasOcupadas;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setFechaAlta($fechaAlta) {
      $this->fechaAlta = $fechaAlta;
  }

    
  function getNLejas() {
      return $this->nLejas;
  }

  function getNPosi() {
      return $this->nPosi;
  }

  function getCodigo() {
      return $this->codigo;
  }

  function getMaterial() {
      return $this->material;
  }

  function getPasillo() {
      return $this->pasillo;
  }

  function setNLejas($nLejas) {
      $this->nLejas = $nLejas;
  }

  function setNPosi($nPosi) {
      $this->nPosi = $nPosi;
  }

  function setCodigo($codigo) {
      $this->codigo = $codigo;
  }

  function setMaterial($material) {
      $this->material = $material;
  }

  function setPasillo($pasillo) {
      $this->pasillo = $pasillo;
  }

  public function __toString() {
      return ($this->getCodigo().$this->getNLejas().$this->getNLejasOcupadas().$this->getMaterial().$this->getPasillo().$this->getNPosi().$this->getFechaAlta());
  }

  
}

