<?php

include("../db/Conexion.php");

    class Direccion{

        public $idDireccion;
        public $idCliente;
        public $nombre;
        public $estado;
        public $fecha;
        public $hora;

        //Obtener id
        public function getIdDireccion(){
            return $this->idDireccion;
        }
        //Setear id
        public function setIdDireccion($_idDireccion){
            $this->idDireccion = $_idDireccion;
        }
        //Obtener id de cliente
        public function getIdCliente(){
            return $this->idCliente;
        }
        //Setear id de cliente
        public function setIdCliente($_idCliente){
            $this->idCliente = $_idCliente;
        }
        //Obtener nombre
        public function getNombre(){
            return $this->nombre;
        }
        //Setear nombre
        public function setNombre($_nombre){
            $this->nombre = $_nombre;
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

        //----------------------Función para guardar dirección--------------------------------

        public function guardar($idClienteg,$nombreg,$fechag,$horag){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into direccion(id_cliente,nombre,fecha,hora)values(?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('isss',$idClienteg, $nombreg, $fechag, $horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //---------------------Función para editar dirección--------------------------------------

        public function editar($nombree, $idEditare){

            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update direccion set nombre=? where id_direccion=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('si',$nombree,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

        }

        //---------------------Función para desactivar una dirección------------------------------

        public function desactivar($idDesactivar){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 0;
         //Instrucción SQL
         $sql = "update direccion set estado=? where id_direccion=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idDesactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //---------------------Función para reactivar una dirección-------------------------------

        public function reactivar($idReactivar){

            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucción SQL
         $sql = "update direccion set estado=? where id_direccion=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //---------------------Función para buscar por id-----------------------------------------

        public function buscarPorId($idBusqueda){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoDireccion = new Direccion();
         
         //Instrucción SQL
        $sql = "select *from direccion where id_direccion='" . $idBusqueda . "'" ." and estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoDireccion->setIdDireccion($fila[0]);
            $resultadoDireccion->setIdCliente($fila[1]);
            $resultadoDireccion->setNombre($fila[2]);
            $resultadoDireccion->setEstado($fila[3]);
            $resultadoDireccion->setFecha($fila[4]);
            $resultadoDireccion->setHora($fila[5]);
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoDireccion;
        }

        //---------------------Función para obtener todas las direcciones-------------------------

        public function obtenerDirecciones(){

            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDireccion = array();
        //Instrucción SQL
        $sql = "select *from direccion where estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $direccionIndex = new Direccion();

            $direccionIndex->setIdDireccion($fila[0]);
            $direccionIndex->setIdCliente($fila[1]);
            $direccionIndex->setNombre($fila[2]);
            $direccionIndex->setEstado($fila[3]);
            $direccionIndex->setFecha($fila[4]);
            $direccionIndex->setHora($fila[5]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoDireccion,$direccionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDireccion;

        }

        //---------------------Función para obtener todas las direcciones inactivas---------------

        public function obtenerDireccionesInactivas(){

        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDireccion = array();
        //Instrucción SQL
        $sql = "select *from direccion where estado=0";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $direccionIndex = new Direccion();

            $direccionIndex->setIdDireccion($fila[0]);
            $direccionIndex->setIdCliente($fila[1]);
            $direccionIndex->setNombre($fila[2]);
            $direccionIndex->setEstado($fila[3]);
            $direccionIndex->setFecha($fila[4]);
            $direccionIndex->setHora($fila[5]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoDireccion,$direccionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDireccion;
        }

        //--------------------Función para obtener direcciones de un cliente específico------------

        public function obtenerDireccionesCliente($idClienteb){
            
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDireccion = array();
        //Instrucción SQL
        $sql = "select *from direccion where estado=1" . " and id_cliente='" . $idClienteb . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $direccionIndex = new Direccion();

            $direccionIndex->setIdDireccion($fila[0]);
            $direccionIndex->setIdCliente($fila[1]);
            $direccionIndex->setNombre($fila[2]);
            $direccionIndex->setEstado($fila[3]);
            $direccionIndex->setFecha($fila[4]);
            $direccionIndex->setHora($fila[5]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoDireccion,$direccionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDireccion;
        }

    }

?>