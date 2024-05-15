<?php

class Pasajero
{
    private $nombre;
    private $documento;
    private $numAsiento;
    private $numTicket;

    public function __construct($nombre, $doc, $numAsiento, $numTicket) {
        $this->nombre = $nombre;
        $this->documento = $doc;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getDocumento() {
        return $this->documento;
    }
    public function getNumAsiento() {
        return $this->numAsiento;
    }
    public function getNumTicket() {
        return $this->numTicket;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDocumento($doc){
        $this->documento = $doc;
    }
    public function setNumAsiento($numAsiento) {
        $this->numAsiento = $numAsiento;
    }
    public function setNumTicket($numTicket){
        $this->numTicket = $numTicket;
    }
    public function darPorcentajeIncremento() {
        return 0/100;
    }
}