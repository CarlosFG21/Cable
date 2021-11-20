<?php

    require "db/Conexion.php";

    class Reparacion{

        public $idReparacion;
        
        public $idCliente;
        public $nombreCliente;
        
        public $idDireccion;
        public $nombreDireccion;
        
        public $idPersonal;
        public $nombrePersonal;

        public $descripcion;
        public $estado;
        public $fechaReporte;
        public $hora;

        //Obtener id de reparación
        public function getIdReparacion(){
            return $this->idReparacion;
        }
        //Setear id de reparación
        public function setIdReparacion($_idReparacion){
            $this->idReparacion = $_idReparacion;
        }
        //Obtener id de id de cliente
        public function getIdCliente(){
            return $this->idCliente;
        }
        //Setear id de id de cliente
        public function setIdCliente($_idCliente){
            $this->idCliente = $_idCliente;
        }
        //Obtener nombre de cliente
        public function getNombreCliente(){
            return $this->nombreCliente;
        }
        //Setear nombre de cliente
        public function setNombreCliente($_nombreCliente){
            $this->nombreCliente = $_nombreCliente;
        }
        //Obtener id de dirección
        public function getDireccion(){
            return $this->direccion;
        }
        //Setear id de dirección
        public function setIdDireccion($_idDireccion){
            $this->idDireccion = $_idDireccion;
        }
        //Obtener nombre de dirección
        public function getNombreDireccion(){
            return $this->nombreDireccion;
        }
        //Setear nombre de dirección
        public function setNombreDireccion($_nombreDireccion){
            $this->nombreDireccion = $_nombreDireccion;
        }
        //Obtener id de personal
        public function getIdPersonal(){
            return $this->idPersonal;
        }
        //Setear id de personal
        public function setIdPersonal($_idPersonal){
            $this->idPersonal = $_idPersonal;
        }
        //Obtener nombre de personal
        public function getNombrePersonal(){
            return $this->nombrePersonal;
        }
        //Setear nombre de personal
        public function setNombrePersonal($_nombrePersonal){
            $this->nombrePersonal = $_nombrePersonal;
        }
        //Obtener descripción
        public function getDescripcion(){
            return $this->descripcion;
        }
        //Setear descripción
        public function setDescripcion($_descripcion){
            $this->descripcion = $_descripcion;
        }
        //Obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //Setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }
        //Obtener fecha de reporte
        public function getFechaReporte(){
            return $this->fechaReporte;
        }
        //Setear fecha de reporte
        public function setFechaReporte($_fechaReporte){
            $this->fechaReporte = $_fechaReporte;
        }
        //Obtener hora de reporte
        public function getHora(){
            return $this->hora;
        }
        //Setear hora de reporte
        public function setHora($_hora){
            $this->hora = $_hora;
        }

        //--------------------------Función para guardar reparación----------------------------

        public function guardar($idClienteg, $idDirecciong,$idPersonalg,$descripciong,$fechaReporteg,$horag){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into reparacion(id_cliente,id_direccion,id_personal,descripcion,fecha_reporte,hora)values(?,?,?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('iiisss',$idClienteg,$idDirecciong,$idPersonalg,$descripciong,$fechaReporteg,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //--------------------------Función para editar reparación------------------------------

        public function editar($idClientee, $idDireccione,$idPersonale,$descripcione,$fechaReportee,$horae,$idReparacione){
             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update reparacion set id_cliente=?, id_direccion=?, id_personal=?, descripcion=?, fecha_reporte=?, hora=? where id_reparacion=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('iiisssi',$idClientee,$idDireccione,$idPersonale,$descripcione,$fechaReportee,$horae,$idReparacione);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //--------------------------Función para desactivar reparación--------------------------

        public function desactivar($idDesactivar){
             //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 0;
         //Instrucción SQL
         $sql = "update reparacion set estado=? where id_reparacion=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idDesactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //--------------------------Función para reactivar reparación---------------------------

        public function reactivar($idReactivar){
             //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucción SQL
         $sql = "update reparacion set estado=? where id_reparacion=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();

        }

        //--------------------------Función para consultar todas las reparaciones---------------

        public function obtenerReparaciones(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoReparacion = array();
        //Instrucción SQL
        $sql = "select r.id_reparacion, r.id_cliente, r.id_direccion, r.id_personal, r.descripcion, r.estado, r.fecha_reporte, r.hora, c.id_cliente, c.nombres as nombres_cliente, c.apellidos as apellidos_cliente, d.id_direccion, d.nombre as nombre_direccion, p.id_personal, p.nombres as nombres_personal, p.apellidos as apellidos_personal from reparacion r, cliente c, direccion d, personal p where r.id_cliente = c.id_cliente and r.id_direccion = d.id_direccion and r.id_personal = p.id_personal and r.estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $reparacionIndex = new Reparacion();

            $reparacionIndex->setIdReparacion($fila['id_reparacion']);
            $reparacionIndex->setIdCliente($fila['id_cliente']);
            $reparacionIndex->setNombreCliente($fila['nombres_cliente'] . " " . $fila['apellidos_cliente']);
            $reparacionIndex->setIdDireccion($fila['id_direccion']);
            $reparacionIndex->setNombreDireccion($fila['nombre_direccion']);
            $reparacionIndex->setIdPersonal($fila['id_personal']);
            $reparacionIndex->setNombrePersonal($fila['nombres_personal'] . " ". $fila['apellidos_personal']);
            $reparacionIndex->setDescripcion($fila['descripcion']);
            $reparacionIndex->setEstado($fila['estado']);
            $reparacionIndex->setFechaReporte($fila['fecha_reporte']);
            $reparacionIndex->setHora($fila['hora']);
           

            //Llenamos el array de resultados de usuarios
            array_push($resultadoReparacion,$reparacionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoReparacion;
        }

        //-------------------------Función para obtener reparaciones inactivas o concluidas-----

        public function obtenerReparacionesInactivas(){
             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoReparacion = array();
        //Instrucción SQL
        $sql = "select r.id_reparacion, r.id_cliente, r.id_direccion, r.id_personal, r.descripcion, r.estado, r.fecha_reporte, r.hora, c.id_cliente, c.nombres as nombres_cliente, c.apellidos as apellidos_cliente, d.id_direccion, d.nombre as nombre_direccion, p.id_personal, p.nombres as nombres_personal, p.apellidos as apellidos_personal from reparacion r, cliente c, direccion d, personal p where r.id_cliente = c.id_cliente and r.id_direccion = d.id_direccion and r.id_personal = p.id_personal and r.estado=0";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $reparacionIndex = new Reparacion();

            $reparacionIndex->setIdReparacion($fila['id_reparacion']);
            $reparacionIndex->setIdCliente($fila['id_cliente']);
            $reparacionIndex->setNombreCliente($fila['nombres_cliente'] . " " . $fila['apellidos_cliente']);
            $reparacionIndex->setIdDireccion($fila['id_direccion']);
            $reparacionIndex->setNombreDireccion($fila['nombre_direccion']);
            $reparacionIndex->setIdPersonal($fila['id_personal']);
            $reparacionIndex->setNombrePersonal($fila['nombres_personal'] . " ". $fila['apellidos_personal']);
            $reparacionIndex->setDescripcion($fila['descripcion']);
            $reparacionIndex->setEstado($fila['estado']);
            $reparacionIndex->setFechaReporte($fila['fecha_reporte']);
            $reparacionIndex->setHora($fila['hora']);
           

            //Llenamos el array de resultados de usuarios
            array_push($resultadoReparacion,$reparacionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoReparacion;
        }

        //-------------------------Función para buscar reparación por id------------------------

        public function buscarPorId($idBusqueda){

            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoReparacion = new Reparacion();
         
         //Instrucción SQL
        $sql = "select r.id_reparacion, r.id_cliente, r.id_direccion, r.id_personal, r.descripcion, r.estado, r.fecha_reporte, r.hora, c.id_cliente, c.nombres as nombres_cliente, c.apellidos as apellidos_cliente, d.id_direccion, d.nombre as nombre_direccion, p.id_personal, p.nombres as nombres_personal, p.apellidos as apellidos_personal from reparacion r, cliente c, direccion d, personal p where r.id_cliente = c.id_cliente and r.id_direccion = d.id_direccion and r.id_personal = p.id_personal and r.estado=1" . " and r.id_reparacion='" . $idBusqueda . "'";;
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoReparacion->setIdReparacion($fila['id_reparacion']);
            $resultadoReparacion->setIdCliente($fila['id_cliente']);
            $resultadoReparacion->setNombreCliente($fila['nombres_cliente'] . " " . $fila['apellidos_cliente']);
            $resultadoReparacion->setIdDireccion($fila['id_direccion']);
            $resultadoReparacion->setNombreDireccion($fila['nombre_direccion']);
            $resultadoReparacion->setIdPersonal($fila['id_personal']);
            $resultadoReparacion->setNombrePersonal($fila['nombres_personal'] . " ". $fila['apellidos_personal']);
            $resultadoReparacion->setDescripcion($fila['descripcion']);
            $resultadoReparacion->setEstado($fila['estado']);
            $resultadoReparacion->setFechaReporte($fila['fecha_reporte']);
            $resultadoReparacion->setHora($fila['hora']);
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoReparacion;

        }

        //-------------------------Función para obtener reparaciones por dirección de cliente----

        public function obtenerReparacionesPorDireccion($idDireccionBusqueda){
             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoReparacion = array();
        //Instrucción SQL
        $sql = "select r.id_reparacion, r.id_cliente, r.id_direccion, r.id_personal, r.descripcion, r.estado, r.fecha_reporte, r.hora, c.id_cliente, c.nombres as nombres_cliente, c.apellidos as apellidos_cliente, d.id_direccion, d.nombre as nombre_direccion, p.id_personal, p.nombres as nombres_personal, p.apellidos as apellidos_personal from reparacion r, cliente c, direccion d, personal p where r.id_cliente = c.id_cliente and r.id_direccion = d.id_direccion and r.id_personal = p.id_personal and r.estado=1" . " and r.id_direccion='" . $idDireccionBusqueda . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $reparacionIndex = new Reparacion();

            $reparacionIndex->setIdReparacion($fila['id_reparacion']);
            $reparacionIndex->setIdCliente($fila['id_cliente']);
            $reparacionIndex->setNombreCliente($fila['nombres_cliente'] . " " . $fila['apellidos_cliente']);
            $reparacionIndex->setIdDireccion($fila['id_direccion']);
            $reparacionIndex->setNombreDireccion($fila['nombre_direccion']);
            $reparacionIndex->setIdPersonal($fila['id_personal']);
            $reparacionIndex->setNombrePersonal($fila['nombres_personal'] . " ". $fila['apellidos_personal']);
            $reparacionIndex->setDescripcion($fila['descripcion']);
            $reparacionIndex->setEstado($fila['estado']);
            $reparacionIndex->setFechaReporte($fila['fecha_reporte']);
            $reparacionIndex->setHora($fila['hora']);
           

            //Llenamos el array de resultados de usuarios
            array_push($resultadoReparacion,$reparacionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoReparacion;
        }

        //-------------------------Función para obtener todas las reparaciones por cliente--------

        public function obtenerReparacionesPorCliente($idClienteBusqueda){
             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoReparacion = array();
        //Instrucción SQL
        $sql = "select r.id_reparacion, r.id_cliente, r.id_direccion, r.id_personal, r.descripcion, r.estado, r.fecha_reporte, r.hora, c.id_cliente, c.nombres as nombres_cliente, c.apellidos as apellidos_cliente, d.id_direccion, d.nombre as nombre_direccion, p.id_personal, p.nombres as nombres_personal, p.apellidos as apellidos_personal from reparacion r, cliente c, direccion d, personal p where r.id_cliente = c.id_cliente and r.id_direccion = d.id_direccion and r.id_personal = p.id_personal and r.estado=1" . " and r.id_cliente='" . $idClienteBusqueda . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $reparacionIndex = new Reparacion();

            $reparacionIndex->setIdReparacion($fila['id_reparacion']);
            $reparacionIndex->setIdCliente($fila['id_cliente']);
            $reparacionIndex->setNombreCliente($fila['nombres_cliente'] . " " . $fila['apellidos_cliente']);
            $reparacionIndex->setIdDireccion($fila['id_direccion']);
            $reparacionIndex->setNombreDireccion($fila['nombre_direccion']);
            $reparacionIndex->setIdPersonal($fila['id_personal']);
            $reparacionIndex->setNombrePersonal($fila['nombres_personal'] . " ". $fila['apellidos_personal']);
            $reparacionIndex->setDescripcion($fila['descripcion']);
            $reparacionIndex->setEstado($fila['estado']);
            $reparacionIndex->setFechaReporte($fila['fecha_reporte']);
            $reparacionIndex->setHora($fila['hora']);
           

            //Llenamos el array de resultados de usuarios
            array_push($resultadoReparacion,$reparacionIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoReparacion;
        }

        
    }

?>