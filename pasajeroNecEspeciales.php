<?php
include_once 'Pasajero.php';

class pasajeroNecEspeciales extends Pasajero
{
    private $necSillaRuedas;
    private $necAsistencia;
    private $necComidaEspecial;

    public function __construct($nombre, $doc,  $numAsiento, $numTicket, $sillaRuedas, $asistEmbarque, $comidaEsp)
    {
        parent::__construct($nombre, $doc, $numAsiento, $numTicket);
        $this->necSillaRuedas = $sillaRuedas;
        $this->necAsistencia = $asistEmbarque;
        $this->necComidaEspecial = $comidaEsp;
    }
    public function getNecSillaRuedas(){
        return $this->necSillaRuedas;
    }
    public function getNecAsistencia() {
        return $this->necAsistencia;
    }
    public function getNecComidaEspecial(){
        return $this->necComidaEspecial;
    }
    public function setNecSillaRuedas($necSillaRuedas){
        $this->necSillaRuedas = $necSillaRuedas;
    }
    public function setNecAsistencia($necAsistencia){
        $this->necAsistencia = $necAsistencia;
    }
    public function setNecComidaEspecial($necComidaEspecial){
        $this->necComidaEspecial = $necComidaEspecial;
    }
    public function darPorcentajeIncremento() {
        if ($this->getNecSillaRuedas() && $this->getNecAsistencia() && $this->getNecComidaEspecial()) {
            $porcIncremento = 30/100;
        } else  {
            $porcIncremento = 15 / 100;
        }
        return $porcIncremento;
    }
}