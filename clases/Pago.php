<?php

    class Pago{
        public $idPago;
        public $idDetalleServicio;
        public $descripcion;
        public $mes;
        public $anio;
        public $total;
        public $estado;
        public $fecha;
        public $hora;

        //Obtener id
        public function getIdPago(){
            return $this->idPago;
        }
        //Setear id de pago
        public function setIdPago($_idPago){
            $this->idPago = $_idPago;
        }
        //Obtener id de detalle de servicio
        public function getIdDetalleServicio(){
            return $this->idDetalleServicio;
        }
        //Setear id de detalle de servicio
        public function setIdDetalleServicio($_idDetalleServicio){
            $this->idDetalleServicio = $_idDetalleServicio;
        }
        //Obtener descripción
        public function getDescripcion(){
            return $this->descripcion;
        }
        //Setear descripción
        public function setDescripcion($_descripcion){
            $this->descripcion = $_descripcion;
        }
        //Obtener mes
        public function getMes(){
            return $this->mes;
        }
        //Setear mes
        public function setMes($_mes){
            $this->mes = $_mes;
        }
        //Obtener anio
        public function getAnio(){
            return $this->anio;
        }
        //Setear anio
        public function setAnio($_anio){
            $this->anio = $_anio;
        }
        //Obtener total
        public function getTotal(){
            return $this->total;
        }
        //Setear total
        public function setTotal($_total){
            $this->total = $_total;
        }
        //Obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //Setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }
        //Obtener fecha
        public function getFecha(){
            return $this->fecha;
        }
        //Setear fecha
        public function setFecha($_fecha){
            $this->fecha = $_fecha;
        }
        //Obtener hora
        public function getHora(){
            return $this->hora;
        }
        //Setear hora
        public function setHora($_hora){
            $this->hora = $_hora;
        }

        //----------------------Guardar un pago--------------------------------------

        public function guardar(){

        }

        //---------------------Editar un pago----------------------------------------
        
        public function editar(){

        }

        //---------------------Desactivar un pago------------------------------------

        public function desactivar($idDesactivar){

        }
        
        //---------------------Reactivar un pago-------------------------------------

        public function reactivar($idReactivar){

        }

        //---------------------Validar existencia pago-------------------------------

        public function validarExistencia($mesPago,$anioPago,$idCliente){

        }

        //--------------------Validar solvencia cliente------------------------------

        public function validarSolvencia($idCliente){

        }

        //--------------------funcion

        public function validar(){
            
        }

    }


?>