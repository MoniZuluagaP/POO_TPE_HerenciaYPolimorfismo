<?php

include_once 'Pasajero.php';

class PasajeroEstandar extends Pasajero
{

    public function __construct($nombre, $doc, $numAsiento, $numTicket){
        parent::__construct($nombre, $doc, $numAsiento, $numTicket);
    }
    public function darPorcentajeIncremento() {
        return 10/100;
    }
}
