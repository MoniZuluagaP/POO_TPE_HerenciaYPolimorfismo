<?php
include_once "Viaje.php";
include_once "ResponsableV.php";
include_once "PasajeroEstandar.php";
include_once "PasajeroVIP.php";
include_once "pasajeroNecEspeciales.php";

$responsableViaje = new ResponsableV(12, 32222454, "Juan", "Perez");
$viaje1 = new Viaje("V123", "Madrid", 4,$responsableViaje, 1000);
$pasajero1 = new PasajeroEstandar("Ana López",5641, 1, "T123");
$pasajero2 = new PasajeroVIP("Pedro Sánchez", 6549, 2, "T456", 15, 50);
$pasajero3 = new pasajeroNecEspeciales("Maria Durán", 4568, 3, "T789", true, true, true);
$pasajero4 = new PasajeroNecEspeciales("Lucia Gomez",  9654,4, "T987", true, false, false);
$pasajero5 = new PasajeroNecEspeciales("Sofia Ruiz", 1245, 5, "T654", false, false, false);


$valorPasaje1 = $viaje1->venderPasaje($pasajero1);
if ($valorPasaje1 != 0) {
    echo "El pasaje pudo ser vendido a: ".$pasajero1->getNombre()."\n";
} else {
    echo "El pasaje no puede ser vendido a " . $pasajero1->getNombre()."\n";
}

$valorPasaje2 = $viaje1->venderPasaje($pasajero2);
if ($valorPasaje2 != 0) {
    echo "El pasaje pudo ser vendido a: ".$pasajero2->getNombre()."\n";
} else {
    echo "El pasaje no puede ser vendido a " . $pasajero2->getNombre()."\n";
}

$valorPasaje3 = $viaje1->venderPasaje($pasajero3);
if ($valorPasaje3 != 0) {
    echo "El pasaje pudo ser vendido a: ".$pasajero3->getNombre()."\n";
} else {
    echo "El pasaje no puede ser vendido a " . $pasajero3->getNombre()."\n";
}

$valorPasaje4 = $viaje1->venderPasaje($pasajero4);
if ($valorPasaje4 != 0) {
    echo "El pasaje pudo ser vendido a: ".$pasajero4->getNombre()."\n";
} else {
    echo "El pasaje no puede ser vendido a " . $pasajero4->getNombre()."\n";
}

$valorPasaje5 = $viaje1->venderPasaje($pasajero5);
if ($valorPasaje5 != 0) {
    echo "El pasaje pudo ser vendido a: ".$pasajero5->getNombre()."\n";
} else {
    echo "El pasaje no puede ser vendido a " . $pasajero5->getNombre()."\n";
}


echo "\nLos datos completos del viaje son:\n\n".$viaje1->mostrarPasajeros();