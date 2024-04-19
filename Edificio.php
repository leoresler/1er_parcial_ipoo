<?php

class Edificio {
    private $direccion;
    private $colInmuebles; // coleccion que hace referencia a inmueble
    private $objAdministrador; // referencia a la clase persona

    // constructor de la clase
    public function __construct($direccion, $objAdministrador)
    {
        $this->direccion = $direccion;
        $this->colInmuebles = [];
        $this->objAdministrador = $objAdministrador;
    }

    
    // metodos de acceso get y set
    public function getDireccion() {
        return $this->direccion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getObjAdministrador() {
        return $this->objAdministrador;
    }
    public function setObjAdministrador($objAdministrador) {
        $this->objAdministrador = $objAdministrador;
    }

    public function getColInmuebles() {
        return $this->colInmuebles;
    }
    public function setColInmuebles($colInmuebles) {
        $this->colInmuebles = $colInmuebles;
    }


    public function __toString() {
        $cadena = "\n\nDirección: " . $this->getDireccion() . "\n";
        $cadena .= "\nDatos del administrador: " . $this->getObjAdministrador() . "\n";
        $cadena .= "\nInmuebles:\n";
        foreach ($this->getColInmuebles() as $inmueble) {
            $cadena .= $inmueble . "\n"; 
        }
        
        return $cadena;
    }


    public function darInmueblesDisponibles($tipoUso, $costoMaximo) {
        $colDisponibles = [];
        $inmuebles = $this->getColInmuebles();

        foreach ($inmuebles as $unInm) {
            if ($unInm->getTipoInmueble() === $tipoUso && $unInm->estaDisponible($tipoUso, $costoMaximo)) {
                $colDisponibles[] = $unInm;
            }
        }
        return $colDisponibles;
    }


    public function buscarInmueble($obj) {
        $inmuebleEncotrado = -1;
        $inmuebles = $this->getColInmuebles();

        foreach ($inmuebles as $indice => $unImn) {
            if ($unImn === $obj) {
                $inmuebleEncotrado = $indice;
            }
        }
        return $inmuebleEncotrado;
    }


    public function registrarAlquilerInmueble($tipoUso, $montoMaximo, $objPersona) {
        $puedeAlquilarse = true;
        $inmueblesDisponibles = $this->darInmueblesDisponibles($tipoUso, $montoMaximo);

        if (count($inmueblesDisponibles) === 0) { // si es igual a cero es porque no hay inmuebles para alquilar
            $puedeAlquilarse = false;
        }

        foreach($inmueblesDisponibles as $unImn) {
            for($i = 1; $i < $unImn->getNroPiso(); $i++) {
                $inmueblePisoInf = $this->buscarInmueblePorPisoYTipo($i, $tipoUso);
                if ($inmueblePisoInf !== null && !$inmueblePisoInf->getObjInquilino()) {
                    $puedeAlquilarse = false;
                };
            }   
        }
        $inmuebleAsignado = $inmueblesDisponibles[0]; // se asigna el primer inmueble disponible
        $inmuebleAsignado->setObjInquilino($objPersona);
        return $puedeAlquilarse;
    }

    // funcion privada que sirve para buscar los inmuebles ocupados por piso. Es utilizada en registrarAlquilerInmueble
    private function buscarInmueblePorPisoYTipo($nroPiso, $tipoUso) {
        $inmuebleOcupado = null;
        foreach ($this->colInmuebles as $unImn) {
            if ($unImn->getNroPiso() === $nroPiso && $unImn->getTipoInmueble() === $tipoUso) {
                $inmuebleOcupado = $unImn; // Retorna el inmueble si coincide con el número de piso y tipo de uso
            }
        }
        return $inmuebleOcupado; // Retorna null si no se encuentra ningún inmueble con los criterios especificados
    }


    public function calculaCostoEdificio() {
        $costoTotal = 0;
        
        foreach ($this->colInmuebles as $inmueble) {
            if ($inmueble->getObjInquilino() !== null) {
                $costoTotal += $inmueble->getCostoMensual();
            }
        }
        
        return $costoTotal;
    }




}

