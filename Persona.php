<?php

class Persona {

    private $tipoDoc;
    private $numDoc;
    private $nombre;
    private $apellido;
    private $telefono;
    
    //metodo constructor
    public function __construct($tipoDoc, $numDoc, $nombre, $apellido, $telefono)
    {
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> numDoc = $numDoc;
        $this -> telefono = $telefono;
        $this -> tipoDoc = $tipoDoc;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }
    
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    
    public function getNumDoc() {
        return $this->numDoc;
    }

    public function setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }

    public function getTipoDoc() {
        return $this->tipoDoc;
    }

    public function setTipoDoc($tipoDoc) {
        $this->tipoDoc = $tipoDoc;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function __toString() {
        return "\nTipo de documento: " . $this->getTipoDoc() . "\nNumero de documento: " . $this->getNumDoc() . "\nNombre: " . $this->getNombre() . "\nApellido: " . $this->getApellido() . "\nTelefono: " . $this->getTelefono();
    }

}