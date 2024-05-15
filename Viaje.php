<?php

class Viaje {
    private $codViaje;
    private $destViaje;
    private $cantMaxPasajeros;
    private $colPasajeros; //Arreglo multidimensional. Un arreglo indexado en el que cada elemento es un arreglo cuyos elementos son de clase Pasajero
    private $responsableViaje;
    private $costoViaje;
    private $AbonoTotalViaje;

    public function __construct( $identViaje, $destino, $cantidadMax, ResponsableV $responsable, $precioViaje){
        $this->codViaje = $identViaje;
        $this->destViaje = $destino;
        $this->cantMaxPasajeros = $cantidadMax;
        $this->responsableViaje = $responsable;
        $this->costoViaje = $precioViaje;
        $this->colPasajeros = [];
        $this->AbonoTotalViaje = 0;
    }
    public function setCodViaje($identViaje){
        $this->codViaje = $identViaje;
    }
    public function setDestViaje($destino){
        $this->destViaje = $destino;
    }
    public function setCantPasajeros($cantidadMax){
        $this->cantMaxPasajeros = $cantidadMax;
    }
    public function setRespViaje(ResponsableV $responsable){
        $this->responsableViaje = $responsable;
    }
    public function setListaPasajeros($colPasajeros){
        $this->colPasajeros = $colPasajeros;
    }
    public function setCostoPasajero($costo){
        $this->costoViaje = $costo;
    }
    public function setTotalPasajes($total){
        $this->AbonoTotalViaje = $total;
    }
    public function getCodViaje(){
        return $this->codViaje;
    }
    public function getDestViaje(){
        return $this->destViaje;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getRespViaje(){
        return $this->responsableViaje;
    }
    public function getListaPasajeros(){
        return $this->colPasajeros;
    }
    public function getCosto(){
        return $this->costoViaje;
    }
    public function getTotalPasajes(){
        return $this->AbonoTotalViaje;
    }
    public function encontrarPasajero($objPasajero){
        $listadoPasaj = $this->getListaPasajeros();
        $estaEnLista = false;
        $i=0;
        while($i<count($listadoPasaj) ){
            if ($listadoPasaj[$i]->getDocumento()==$objPasajero->getDocumento()){
                $estaEnLista = true;
            }
            $i++;
        }
        return $estaEnLista;
    }
    public function hayPasajesDisponibles(){
        $hayDisponibilidad = false;
        $listadoPasaj = $this->getListaPasajeros();
        if (count($listadoPasaj)<$this->getCantMaxPasajeros()){
            $hayDisponibilidad = true;
        }
        return $hayDisponibilidad;
    }
    public function venderPasaje($objPasajero){
        $puedeComprarPasaje = !$this->encontrarPasajero($objPasajero) && $this->hayPasajesDisponibles();
        $precioViajePasajero = 0;
        $listadoPasaj = $this->getListaPasajeros();
        if ($puedeComprarPasaje) {
           $precioViajePasajero = $this->getCosto() + ($objPasajero->darPorcentajeIncremento() * $this->getCosto());
           $totalAbonadoPasajeros = $this->getTotalPasajes() + $precioViajePasajero;
           $this->setTotalPasajes($totalAbonadoPasajeros);
           $listadoPasaj[] = $objPasajero;
           $this->setListaPasajeros($listadoPasaj);
        }
        return $precioViajePasajero;
    }
    public function modifDatosPasajero($idPasajero){
        $existePasajero = $this->encontrarPasajero($idPasajero);
        $listadoPasaj = $this->getListaPasajeros();
        $i = 0;
        $encontrado = false;
        $posPasajero = -1;
        if ($existePasajero){
            while($i<count($listadoPasaj) && !$encontrado){
                if ($listadoPasaj[$i]->getDocumento() == $idPasajero ){
                    $encontrado = true;
                    $posPasajero = $i;
                }
                $i++;
            }
        }
        return $posPasajero;
    }
    public function mostrarPasajeros(){
        $listadoPasaj = $this->getListaPasajeros();
        $cadena = "";
        for($i=0; $i<count($listadoPasaj);$i++){
            $cadena .= "Nombre: ".$listadoPasaj[$i]->getNombre()."\n".
                "DNI: ".$listadoPasaj[$i]->getDocumento()."\n".
                "Tipo de pasajero: ".get_class($listadoPasaj[$i])."\n".
                "y el costo de su viaje es: ".($this->getCosto() + ($listadoPasaj[$i]->darPorcentajeIncremento() * $this->getCosto()))."\n\n";
        }
        return $cadena;
    }
    public function __toString(){
        return "Viaje: ".$this->getCodViaje()."\n".
            "Destino: ".$this->getDestViaje()."\n".
            "Capacidad: ".$this->getCantMaxPasajeros()." personas"."\n".
            "Reponsable del viaje: ".$this->getRespViaje()->getNombreEmpleado()." ".$this->getRespViaje()->getApellidoEmpleado()."\n".
            "y los pasajeros son: ". $this->mostrarPasajeros();
    }
}