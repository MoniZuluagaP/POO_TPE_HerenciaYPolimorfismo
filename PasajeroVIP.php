<?php
include_once 'Pasajero.php';

class PasajeroVIP extends Pasajero
{
    private $numViajFrec;
    private $millasPasaj;

    public function __construct($nombre, $doc, $numAsiento, $numTicket, $viajeroFrec, $millas){
        parent::__construct($nombre, $doc, $numAsiento, $numTicket);
        $this->numViajFrec = $viajeroFrec;
        $this->millasPasaj = $millas;
    }
    public function getNumViajFrec() {
        return $this->numViajFrec;
    }
    public function getCantMillas(){
        return $this->millasPasaj;
    }
    public function setNumViajFrec($numViajFrec){
        $this->numViajFrec = $numViajFrec;
    }
    public function setCantMillas($millas){
        $this->millasPasaj = $millas;
    }
    public function darPorcentajeIncremento() {
        $porcIncremento = 35/100;
        if ($this->getCantMillas() >= 300) {
            $porcIncremento = 30/100;
        }
        return $porcIncremento;
    }
}