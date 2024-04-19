<?php

class Inmueble {
    private $codigoRef;
    private $nroPiso;
    private $tipoInmueble; // comercial o departamento
    private $costoMensual;
    private $objInquilino; // referencia a persona

    // Por política de la empresa los inmuebles de un edificio se deben ir ocupando por piso y por tipo.
    // Es decir, hasta que todos los inmuebles de un piso y de un tipo no se encuentren ocupados,
    // no es posible alquilar un inmueble de un piso superior.


    // constructor de la clase
    public function __construct($codigoRef, $nroPiso, $tipoInmueble, $costoMensual, $objInquilino)
    {
        $this->codigoRef = $codigoRef;
        $this->nroPiso = $nroPiso;
        $this->tipoInmueble = $tipoInmueble;
        $this->costoMensual = $costoMensual;
        $this->objInquilino = $objInquilino;
    }

    
    // metodos de acceso get y set
    public function getCodigoRef() {
        return $this->codigoRef;
    }
    public function setCodigoRef($codigoRef) {
        $this->codigoRef = $codigoRef;
    }

    public function getNroPiso() {
        return $this->nroPiso;
    }
    public function setNroPiso($nroPiso) {
        $this->nroPiso = $nroPiso;
    }

    public function getTipoInmueble() {
        return $this->tipoInmueble;
    }
    public function setTipoInmueble($tipoInmueble) {
        $this->tipoInmueble = $tipoInmueble;
    }

    public function getCostoMensual() {
        return $this->costoMensual;
    }
    public function setCostoMensual($costoMensual) {
        $this->costoMensual = $costoMensual;
    }

    public function getObjInquilino() {
        return $this->objInquilino;
    }
    public function setObjInquilino($objInquilino) {
        $this->objInquilino = $objInquilino;
    }


    public function estaDisponible($tipoUso, $montoMaximo) {
        $objInquilino = $this->getObjInquilino();
        $disponible = true;

        if ($objInquilino !== null) {
            $disponible = false;
        }

        if ($montoMaximo < $this->getCostoMensual()) {
            $disponible = false;
        }

        if ($tipoUso !== $this->getTipoInmueble()) {
            $disponible = false;
        }
        return $disponible;
    }



    public function __toString() {
        return "Código de referencia: " . $this->getCodigoRef() . ", Piso: " . $this->getNroPiso() . ", Tipo: " . $this->getTipoInmueble() . ", Costo mensual: $" . $this->getCostoMensual();
    }




}