<?php
    
    //include("../db/Conexion.php");

    class Servicio{

        public $idServicio;
        public $nombre;
        public $precio;
        public $estado;
        public $fecha;
        public $hora;

        //Obtener id
        public function getIdServicio(){
            return $this->idServicio;
        }
        //Setear id
        public function setIdServicio($_idServicio){
            $this->idServicio = $_idServicio;
        }
        //Obtener nombre
        public function getNombre(){
            return $this->nombre;
        }
        //Setear nombre
        public function setNombre($_nombre){
            $this->nombre = $_nombre;
        }
        //Obtener precio
        public function getPrecio(){
            return $this->precio;
        }
        //Setear precio
        public function setPrecio($_precio){
            $this->precio = $_precio;
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

        //------------------------------Función para guardar un servicio------------------------------------

        public function guardar($nombreg,$preciog,$fechag,$horag){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into servicio(nombre,precio,fecha,hora) values(?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('sdss',$nombreg,$preciog,$fechag,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //------------------------------Función para editar un servicio-------------------------------------

        public function editar($nombree,$precioe,$idEditare){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update servicio set nombre=?,precio=? where id_servicio=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('sdi',$nombree,$precioe,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //------------------------------Función para desactivar un servicio---------------------------------

        public function desactivar($idDesactivar){

            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 0;
         //Instrucción SQL
         $sql = "update servicio set estado=? where id_servicio=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idDesactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //------------------------------Función para reactivar un servicio----------------------------------

        public function reactivar($idReactivar){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucción SQL
         $sql = "update servicio set estado=? where id_servicio=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //------------------------------Función para buscar servicio por id---------------------------------

        public function buscarPorId($idBusqueda){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoServicio = new Servicio();
         
         //Instrucción SQL
        $sql = "select *from servicio where id_servicio='" . $idBusqueda . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoServicio->setIdServicio($fila[0]);
            $resultadoServicio->setNombre($fila[1]);
            $resultadoServicio->setPrecio($fila[2]);
            $resultadoServicio->setEstado($fila[3]);
            $resultadoServicio->setFecha($fila[4]);
            $resultadoServicio->setHora($fila[5]);   
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoServicio;
        }

        //------------------------------Función para obtener todos los servicios----------------------------

        public function obtenerServicios(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoServicio = array();
        //Instrucción SQL
        $sql = "select *from servicio";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $servicioIndex = new Servicio();

            $servicioIndex->setIdServicio($fila[0]);
            $servicioIndex->setNombre($fila[1]);
            $servicioIndex->setPrecio($fila[2]);
            $servicioIndex->setEstado($fila[3]);
            $servicioIndex->setFecha($fila[4]);
            $servicioIndex->setHora($fila[5]);   

            //Llenamos el array de resultados de usuarios
            array_push($resultadoServicio,$servicioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoServicio;

        }

        //------------------------------Función para obtener servicios desactivados o inactivos-------------

        public function obtenerServiciosInactivos(){
            
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoServicio = array();
        //Instrucción SQL
        $sql = "select *from servicio where estado=0";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $servicioIndex = new Servicio();

            $servicioIndex->setIdServicio($fila[0]);
            $servicioIndex->setNombre($fila[1]);
            $servicioIndex->setPrecio($fila[2]);
            $servicioIndex->setEstado($fila[3]);
            $servicioIndex->setFecha($fila[4]);
            $servicioIndex->setHora($fila[5]);   

            //Llenamos el array de resultados de usuarios
            array_push($resultadoServicio,$servicioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoServicio;

        }


    }


?>