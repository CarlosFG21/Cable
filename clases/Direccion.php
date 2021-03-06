<?php

//include("../db/Conexion.php");

    class Direccion{

        public $idDireccion;
        public $idCliente;
        public $nombre;
        public $estado;
        public $fecha;
        public $hora;
        public $latitud;
        public $longitud;

        //obtener latitud
        public function getLatitud(){
            return $this->latitud;
        }
        //Setear latitud
        public function setLatitud($_latitud){
            $this->latitud = $_latitud;
        }
        //Obtener longitud
        public function getLongitud(){
            return $this->longitud;
        }
        //Setear longitud
        public function setLongitud($_longitud){
            $this->longitud = $_longitud;
        }

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

        //----------------------Funci??n para guardar direcci??n--------------------------------

        public function guardar($idClienteg,$nombreg,$fechag,$horag,$latitudg,$longitudg){
            //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucci??n SQL
        $sql = "insert into direccion(id_cliente,nombre,fecha,hora,latitud,longitud)values(?,?,?,?,?,?)";
        //Preparamos la instrucci??n sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los par??metros
        //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
        $stmt->bind_param('isssss',$idClienteg, $nombreg, $fechag, $horag,$latitudg,$longitudg);
          
        //Ejecutamos instrucci??n
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //---------------------Funci??n para editar direcci??n--------------------------------------

        public function editar($nombree, $latitude,$longitude,$idEditare){

            //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucci??n SQL
        $sql = "update direccion set nombre=?, latitud=?, longitud=? where id_direccion=?";
        //Preparamos la instrucci??n sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los par??metros
        //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
        $stmt->bind_param('sssi',$nombree,$latitude,$longitude,$idEditare);
          
        //Ejecutamos instrucci??n
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

        }

        //---------------------Funci??n para desactivar una direcci??n------------------------------

        public function desactivar($idDesactivar){
            //Instanciamos la clase conexi??n
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 0;
         //Instrucci??n SQL
         $sql = "update direccion set estado=? where id_direccion=?";
         //Preparamos la instrucci??n sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
		 $stmt->bind_param('ii',$estado,$idDesactivar);
		 
         //Ejecutamos instrucci??n
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //---------------------Funci??n para reactivar una direcci??n-------------------------------

        public function reactivar($idReactivar){

            //Instanciamos la clase conexi??n
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucci??n SQL
         $sql = "update direccion set estado=? where id_direccion=?";
         //Preparamos la instrucci??n sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucci??n
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //---------------------Funci??n para buscar por id-----------------------------------------

        public function buscarPorId($idBusqueda){
            //Instanciamos la clase conexi??n
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoDireccion = new Direccion();
         
         //Instrucci??n SQL
        $sql = "select *from direccion where id_direccion='" . $idBusqueda . "'";
        //Ejecuci??n de instrucci??n     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoDireccion->setIdDireccion($fila[0]);
            $resultadoDireccion->setIdCliente($fila[1]);
            $resultadoDireccion->setNombre($fila[2]);
            $resultadoDireccion->setEstado($fila[3]);
            $resultadoDireccion->setFecha($fila[4]);
            $resultadoDireccion->setHora($fila[5]);
            $resultadoDireccion->setLatitud($fila['latitud']);
            $resultadoDireccion->setLongitud($fila['longitud']);
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoDireccion;
        }

        //---------------------Funci??n para obtener todas las direcciones-------------------------

        public function obtenerDirecciones(){

            //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDireccion = array();
        //Instrucci??n SQL
        $sql = "select *from direccion where estado=1";
        //Ejecuci??n de instrucci??n     
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
            $direccionIndex->setLatitud($fila['latitud']);
            $direccionIndex->setLongitud($fila['longitud']);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoDireccion,$direccionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDireccion;

        }

        //---------------------Funci??n para obtener todas las direcciones inactivas---------------

        public function obtenerDireccionesInactivas(){

        //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDireccion = array();
        //Instrucci??n SQL
        $sql = "select *from direccion where estado=0";
        //Ejecuci??n de instrucci??n     
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
            $direccionIndex->setLatitud($fila['latitud']);
            $direccionIndex->setLongitud($fila['longitud']);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoDireccion,$direccionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDireccion;
        }

        //--------------------Funci??n para obtener direcciones de un cliente espec??fico------------

        public function obtenerDireccionesCliente($idClienteb){
            
            //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDireccion = array();
        //Instrucci??n SQL
        $sql = "select *from direccion where estado=1" . " and id_cliente='" . $idClienteb . "'";
        //Ejecuci??n de instrucci??n     
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
            $direccionIndex->setLatitud($fila['latitud']);
            $direccionIndex->setLongitud($fila['longitud']);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoDireccion,$direccionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDireccion;
        }

        public function validarDireccion($direccion,$latitud,$longitud){

            //Se efectua una instacia de la clase conexion 
            $conexion = new Conexion();
    
            //Se efectua la conexion con la base de datos
            $conexion->conectar();
    
            //Se declara una variable para validar si el usuario existe
            $resultado =0;
    
            //se declara una variable en donde se contendra todo el script de consulta
            //para la verificacion del usuario
            $sql = "select nombre,latitud,longitud from direccion where nombre='".$direccion."'" . "and latitud='".$latitud."'"."and longitud='".$longitud."'";
    
            //efectuamos la peticion de la consulta mediante el mysqli_query
            $ejecutar =  mysqli_query($conexion->db, $sql);
    
            //se utiliza el ciclo while para recorrer la consulta 
            while($fila =  mysqli_fetch_array($ejecutar)){
    
                if(strcmp($fila[0],$direccion)===0 && strcmp($fila[1],$latitud)===0 && strcmp($fila[2],$longitud)===0){
                    $resultado = 1;
                    break;
                }
            }
    
               //se desconecta la base de datos
            $conexion->conectar();
    
            //retornamos mediante la variable si es 1 o 0 para la verificacion si existe o no
            return $resultado;
    
    
           }

    }

?>