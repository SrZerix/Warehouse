<?php

class Cajas{
    private $codigo;
    private $material;
    private $contenido;
    private $color;
    private $alto;
    private $ancho;
    private $profundidad;
    private $fecha_alta;
    private $id;
    
  function __construct($codigo, $material, $contenido, $color, $alto, $ancho, $profundidad, $fecha_alta) {
        $this->setContenido($contenido);
        $this->setColor($color);
        $this->setCodigo($codigo);
        $this->setMaterial($material);
        $this->setAlto($alto);
        $this->setAncho($ancho);
        $this->setProfundidad($profundidad);
        $this->setFecha_alta($fecha_alta);
  }
  
  function getFecha_alta() {
      return $this->fecha_alta;
  }

  function getId() {
      return $this->id;
  }

  function setFecha_alta($fecha_alta) {
      $this->fecha_alta = $fecha_alta;
  }

  function setId($id) {
      $this->id = $id;
  }

    
  function getCodigo() {
      return $this->codigo;
  }

  function getMaterial() {
      return $this->material;
  }

  function getContenido() {
      return $this->contenido;
  }

  function getColor() {
      return $this->color;
  }

  function getAlto() {
      return $this->alto;
  }

  function getAncho() {
      return $this->ancho;
  }

  function getProfundidad() {
      return $this->profundidad;
  }

  function setCodigo($codigo) {
      $this->codigo = $codigo;
  }

  function setMaterial($material) {
      $this->material = $material;
  }

  function setContenido($contenido) {
      $this->contenido = $contenido;
  }

  function setColor($color) {
      $this->color = $color;
  }

  function setAlto($alto) {
      $this->alto = $alto;
  }

  function setAncho($ancho) {
      $this->ancho = $ancho;
  }

  function setProfundidad($profundidad) {
      $this->profundidad = $profundidad;
  }



}

