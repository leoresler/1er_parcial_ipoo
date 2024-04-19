<?php

include_once "Edificio.php";
include_once "Inmueble.php";
include_once "Persona.php";

// responsable
$objResponsable1 = new Persona("DNI", 27432561, "Carlos", "Martinez", "154321233");

// inquilinos
$objInquilino1 = new Persona("DNI", 12333456, "Pepe", "Suarez", 4456722);

$objInquilino2 = null;

$objInquilino3 = new Persona("DNI", 12333422, "Pedro", "Suarez", 446678);

$objInquilino4 = null;

$objInquilino5 = null;

// edificio
$objEdificio = new Edificio("Juan B. Justo 3456", $objResponsable1);

// inmuebles
$objInmueble1 = new Inmueble(11, 1, "local comercial", 50000, $objInquilino1);

$objInmueble2 = new Inmueble(12, 1, "local comercial", 50000, $objInquilino2);

$objInmueble3 = new Inmueble(13, 2, "departamento", 35000, $objInquilino3);

$objInmueble4 = new Inmueble(14, 2, "departamento", 35000, $objInquilino4);

$objInmueble5 = new Inmueble(15, 3, "departamento", 35000, $objInquilino5);


// Asociar los inmuebles al objeto Edificio
$objEdificio->setColInmuebles([$objInmueble1, $objInmueble2, $objInmueble3, $objInmueble4, $objInmueble5]);

// se asignan los inquilinos creados previamente a los inmuebles específicos
$objInmueble1->setObjInquilino($objInquilino1);
$objInmueble2->setObjInquilino($objInquilino2);
$objInmueble3->setObjInquilino($objInquilino3);
$objInmueble4->setObjInquilino($objInquilino4);
$objInmueble5->setObjInquilino($objInquilino5);


$darInmueblesParaAlquiler = $objEdificio->darInmueblesDisponibles("departamento", 550000);
echo "Resultado:\n";
foreach ($darInmueblesParaAlquiler as $inmueble) {
    echo $inmueble . "\n";
}


$objPersona = new Persona("DNI", 28765436, "Mariela", "Suarez", "25543562");

if ($objEdificio->registrarAlquilerInmueble("departamento", 550000, $objPersona)) {
    echo "\nEl departamento fue alquilado.\n";
} else {
    echo "\nNo fue posible alquilar del departamento.\n";
}


$costoEdificio = $objEdificio->calculaCostoEdificio();
echo "\nCosto del edificio: " . $costoEdificio;


echo "\n\n-----------------------------";
$stringEdificio = $objEdificio->__toString();
echo $stringEdificio;
echo "\n-----------------------------";