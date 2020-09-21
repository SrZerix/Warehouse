<?php

class Pasillo{
private $id;
private $letra;
private $huecosOcupados;

function __construct($letra,$huecosOcupados){
    $this->setLetra($letra);
    $this->setHuecosOcupados($huecosOcupados);
}

function getId() {
    return $this->id;
}

function setId($id) {
    $this->id = $id;
}

function getLetra() {
    return $this->letra;
}

function getHuecosOcupados() {
    return $this->huecosOcupados;
}

function setLetra($letra) {
    $this->letra = $letra;
}

function setHuecosOcupados($huecosOcupados) {
    $this->huecosOcupados = $huecosOcupados;
}

}