<?php
    
    //include("../db/Conexion.php");

    class DetalleServicio{

        public $idDetalleServicio;
        public $idDireccion;
        public $idServicio;
        public $estado;
        public $fecha;
        public $hora;

        public $nombreServicio;
        public $nombreDireccion;
        public $precioServicio;

        //obtener nombre de servicio
        public function getNombreServicio(){
            return $this->nombreServicio;
        }
        //Setear nombre de servicio
        public function setNombreServicio($_nombreServicio){
            $this->nombreServicio = $_nombreServicio;
        }
        //Obtener nombre de dirección
        public function getNombreDireccion(){
            return $this->nombreDireccion;
        }
        //Setear nombre de dirección
        public function setNombreDireccion($_nombreDireccion){
            $this->nombreDireccion = $_nombreDireccion;
        }
        //Obtener precio de servicio
        public function getPrecioServicio(){
            return $this->precioServicio;
        }
        //Setear precio de servicio
        public function setPrecioServicio($_precioServicio){
            $this->precioServicio = $_precioServicio;
        }

        //Obtener id de detalle de servicio
        public function getIdDetalleServicio(){
            return $this->idDetalleServicio;
        }
        //Setear id de detalle de servicio
        public function setIdDetalleServicio($_idDetalleServicio){
            $this->idDetalleServicio = $_idDetalleServicio;
        }
        //Obtener id de dirección
        public function getIdDireccion(){
            return $this->idDireccion;
        }
        //Setear id de dirección
        public function setIdDireccion($_idDireccion){
            $this->idDireccion = $_idDireccion;
        }
        //Obtener id de servicio
        public function getIdServicio(){
            return $this->idServicio;
        }
        //Setear id de servicio
        public function setIdServicio($_idServicio){
            $this->idServicio = $_idServicio;
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

        //-----------------------------Función para guardar un detalle de servicio---------------------------

        public function guardar($idDirecciong,$idServiciog,$fechag,$horag){
             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into detalle_servicio(id_direccion,id_servicio,fecha,hora)values(?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('iiss',$idDirecciong,$idServiciog,$fechag,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //-----------------------------Función para editar un detalle de servicio-----------------------------

        public function editar($idDireccione,$idServicioe,$idDetalleServicioe){
             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update detalle_servicio set id_direccion=?, id_servicio=? where id_detalle_servicio=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('iii',$idDireccione,$idServicioe,$idDetalleServicioe);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //-----------------------------Función para desactivar un detalle de servicio--------------------------
        
        public function desactivar($idDesactivar){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 0;
         //Instrucción SQL
         $sql = "update detalle_servicio set estado=? where id_detalle_servicio=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idDesactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //-----------------------------Función para reactivar un detalle de servicio---------------------------

        public function reactivar($idReactivar){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucción SQL
         $sql = "update detalle_servicio set estado=? where id_detalle_servicio=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //---------------------------Función para obtener todos los detalles de servicios-----------------------

        public function obtenerDetallesServicios(){
             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDetallesServicios = array();
        //Instrucción SQL
        $sql = "select ds.id_detalle_servicio, ds.id_servicio, ds.id_direccion,ds.estado,ds.fecha, ds.hora,s.id_servicio, s.nombre as nombre_servicio, s.precio as precio_servicio, d.id_direccion, d.nombre as nombre_direccion from detalle_servicio ds, servicio s, direccion d where ds.id_servicio = s.id_servicio and ds.id_direccion = d.id_direccion";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $detalleServicioIndex = new DetalleServicio();

            $detalleServicioIndex->setIdDetalleServicio($fila['id_detalle_servicio']);
            $detalleServicioIndex->setIdDireccion($fila['id_direccion']);
            $detalleServicioIndex->setIdServicio($fila['id_servicio']);
            $detalleServicioIndex->setEstado($fila['estado']);
            $detalleServicioIndex->setFecha($fila['fecha']);
            $detalleServicioIndex->setHora($fila['hora']);
            $detalleServicioIndex->setNombreServicio($fila['nombre_servicio']);
            $detalleServicioIndex->setNombreDireccion($fila['nombre_direccion']);
            $detalleServicioIndex->setPrecioServicio($fila['precio_servicio']);

            //Llenamos el array de resultados de detalle de servicios
            array_push($resultadoDetallesServicios,$detalleServicioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDetallesServicios;
        }

        //-------------------------Función para obtener los detalles de servicios inactivos---------------------

        public function obtenerDetallesDeServiciosInactivos(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDetallesServicios = array();
        //Instrucción SQL
        $sql = "select ds.id_detalle_servicio, ds.id_servicio, ds.id_direccion,ds.estado,ds.fecha, ds.hora,s.id_servicio, s.nombre as nombre_servicio, s.precio as precio_servicio, d.id_direccion, d.nombre as nombre_direccion from detalle_servicio ds, servicio s, direccion d where ds.id_servicio = s.id_servicio and ds.id_direccion = d.id_direccion and ds.estado=0";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $detalleServicioIndex = new DetalleServicio();

            $detalleServicioIndex->setIdDetalleServicio($fila['id_detalle_servicio']);
            $detalleServicioIndex->setIdDireccion($fila['id_direccion']);
            $detalleServicioIndex->setIdServicio($fila['id_servicio']);
            $detalleServicioIndex->setEstado($fila['estado']);
            $detalleServicioIndex->setFecha($fila['fecha']);
            $detalleServicioIndex->setHora($fila['hora']);
            $detalleServicioIndex->setNombreServicio($fila['nombre_servicio']);
            $detalleServicioIndex->setNombreDireccion($fila['nombre_direccion']);
            $detalleServicioIndex->setPrecioServicio($fila['precio_servicio']);

            //Llenamos el array de resultados de detalle de servicios
            array_push($resultadoDetallesServicios,$detalleServicioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDetallesServicios;
        }

        //---------------------------Función para buscar detalle de servicio por id-----------------------------

        public function buscarPorId($idBusqueda){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoDetalleServicio = new DetalleServicio();
         
         //Instrucción SQL
        $sql = "select ds.id_detalle_servicio, ds.id_servicio, ds.id_direccion,ds.estado,ds.fecha, ds.hora,s.id_servicio, s.nombre as nombre_servicio, s.precio as precio_servicio, d.id_direccion, d.nombre as nombre_direccion from detalle_servicio ds, servicio s, direccion d where ds.id_servicio = s.id_servicio and ds.id_direccion = d.id_direccion and ds.estado=1 and ds.id_detalle_servicio='" . $idBusqueda . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoDetalleServicio->setIdDetalleServicio($fila['id_detalle_servicio']);
            $resultadoDetalleServicio->setIdDireccion($fila['id_direccion']);
            $resultadoDetalleServicio->setIdServicio($fila['id_servicio']);
            $resultadoDetalleServicio->setEstado($fila['estado']);
            $resultadoDetalleServicio->setFecha($fila['fecha']);
            $resultadoDetalleServicio->setHora($fila['hora']);
            $resultadoDetalleServicio->setNombreServicio($fila['nombre_servicio']);
            $resultadoDetalleServicio->setNombreDireccion($fila['nombre_direccion']);
            $resultadoDetalleServicio->setPrecioServicio($fila['precio_servicio']);
            
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoDetalleServicio;
        }

        //----------------------------Función para obtener todos los servicios de una dirección de vivienda de cliente--------

        public function obtenerDetallesServiciosPorDireccion($idDireccionServicio){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDetallesServicios = array();
        //Instrucción SQL
        $sql = "select ds.id_detalle_servicio, ds.id_servicio, ds.id_direccion,ds.estado,ds.fecha, ds.hora,s.id_servicio, s.nombre as nombre_servicio, s.precio as precio_servicio, d.id_direccion, d.nombre as nombre_direccion from detalle_servicio ds, servicio s, direccion d where ds.id_servicio = s.id_servicio and ds.id_direccion = d.id_direccion and ds.estado=1 and ds.id_direccion='" . $idDireccionServicio . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $detalleServicioIndex = new DetalleServicio();

            $detalleServicioIndex->setIdDetalleServicio($fila['id_detalle_servicio']);
            $detalleServicioIndex->setIdDireccion($fila['id_direccion']);
            $detalleServicioIndex->setIdServicio($fila['id_servicio']);
            $detalleServicioIndex->setEstado($fila['estado']);
            $detalleServicioIndex->setFecha($fila['fecha']);
            $detalleServicioIndex->setHora($fila['hora']);
            $detalleServicioIndex->setNombreServicio($fila['nombre_servicio']);
            $detalleServicioIndex->setNombreDireccion($fila['nombre_direccion']);
            $detalleServicioIndex->setPrecioServicio($fila['precio_servicio']);

            //Llenamos el array de resultados de detalle de servicios
            array_push($resultadoDetallesServicios,$detalleServicioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDetallesServicios;          
        }


        //--------obtener detalles de servicio por usuario------------------

        //----------------------------Función para obtener todos los servicios de una dirección de vivienda de cliente--------

        public function obtenerDetallesServiciosPorCliente($idClient){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoDetallesServicios = array();
        //Instrucción SQL
        $sql = "select ds.id_detalle_servicio, ds.id_servicio, ds.id_direccion,ds.estado,ds.fecha, ds.hora,s.id_servicio, s.nombre as nombre_servicio, s.precio as precio_servicio, d.id_direccion, d.nombre as nombre_direccion, d.id_cliente, c.id_cliente from detalle_servicio ds, servicio s, direccion d, cliente c where ds.id_servicio = s.id_servicio and ds.id_direccion = d.id_direccion and d.id_cliente = c.id_cliente and c.id_cliente='" . $idClient . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $detalleServicioIndex = new DetalleServicio();

            $detalleServicioIndex->setIdDetalleServicio($fila['id_detalle_servicio']);
            $detalleServicioIndex->setIdDireccion($fila['id_direccion']);
            $detalleServicioIndex->setIdServicio($fila['id_servicio']);
            $detalleServicioIndex->setEstado($fila['estado']);
            $detalleServicioIndex->setFecha($fila['fecha']);
            $detalleServicioIndex->setHora($fila['hora']);
            $detalleServicioIndex->setNombreServicio($fila['nombre_servicio']);
            $detalleServicioIndex->setNombreDireccion($fila['nombre_direccion']);
            $detalleServicioIndex->setPrecioServicio($fila['precio_servicio']);

            //Llenamos el array de resultados de detalle de servicios
            array_push($resultadoDetallesServicios,$detalleServicioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoDetallesServicios;          
        }

    }

?>