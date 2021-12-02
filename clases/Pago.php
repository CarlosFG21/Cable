<?php

    class Pago{
        public $idPago;

        public $idUsuario;
        public $nombreUsuario;
        
        public $idDetalleServicio;
        public $nombreServicio;

        public $nombreCliente;

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
        //Obtener id de usuario
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        //Setear id de usuario
        public function setIdUsuario($_idUsuario){
            $this->idUsuario = $_idUsuario;
        }
        //Obtener nombre de usuario
        public function getNombreUsuario(){
            return $this->nombreUsuario;
        }
        //Setear nombre de usuario
        public function setNombreUsuario($_nombreUsuario){
            $this->nombreUsuario = $_nombreUsuario;
        }
        //Obtener id de detalle de servicio
        public function getIdDetalleServicio(){
            return $this->idDetalleServicio;
        }
        //Setear id de detalle de servicio
        public function setIdDetalleServicio($_idDetalleServicio){
            $this->idDetalleServicio = $_idDetalleServicio;
        }
        //Obtener nombre del servicio
        public function getNombreServicio(){
            return $this->nombreServicio;
        }
        //Setear nombre del servicio
        public function setNombreServicio($_nombreServicio){
            $this->nombreServicio = $_nombreServicio;
        }
        //Obtener el nombre del cliente
        public function getNombreCliente(){
            return $this->nombreCliente;
        }
        //Setear nombre del cliente
        public function setNombreCliente($_nombreCliente){
            $this->nombreCliente = $_nombreCliente;
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

        public function guardar($idDetalleServiciog,$idUsuariog,$descripciong,$mesg,$aniog,$totalg,$fechag,$horag){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into pago(id_detalle_servicio,id_usuario,descripcion,mes,anio,total,fecha,hora)values(?,?,?,?,?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('iisiidss',$idDetalleServiciog,$idUsuariog,$descripciong,$mesg,$aniog,$totalg,$fechag,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //---------------------Editar un pago----------------------------------------
        
        public function editar($idDetalleServicioe,$idUsuarioe,$descripcione,$mese,$anioe,$totale,$fechae,$horae,$idEditare){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update pago set id_detalle_servicio=?,id_usuario=?,descripcion=?,mes=?,anio=?,total=?,fecha=?,hora=? where id_detalle_servicio=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('iisiidssi',$idDetalleServicioe,$idUsuarioe,$descripcione,$mese,$anioe,$totale,$fechae,$horae,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //---------------------Desactivar un pago------------------------------------

        public function desactivar($idDesactivar){
             //Instanciamos la clase conexión
          $conexion = new Conexion();
          //Conectamos a la base de datos
          $conexion->conectar();
          //Estado a enviar
          $estado = 0;
          //Instrucción SQL
          $sql = "update pago set estado=? where id_pago=?";
          //Preparamos la instrucción sql
          $stmt = $conexion->db->prepare($sql);
          
          //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
          $stmt->bind_param('ii',$estado,$idDesactivar);
          
          //Ejecutamos instrucción
          $stmt->execute();
          
          //Desconectamos la base de datos
          $conexion->desconectar();
        }
        
        //---------------------Reactivar un pago-------------------------------------

        public function reactivar($idReactivar){
            //Instanciamos la clase conexión
          $conexion = new Conexion();
          //Conectamos a la base de datos
          $conexion->conectar();
          //Estado a enviar
          $estado = 1;
          //Instrucción SQL
          $sql = "update pago set estado=? where id_pago=?";
          //Preparamos la instrucción sql
          $stmt = $conexion->db->prepare($sql);
          
          //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
          $stmt->bind_param('ii',$estado,$idReactivar);
          
          //Ejecutamos instrucción
          $stmt->execute();
          
          //Desconectamos la base de datos
          $conexion->desconectar();
        }

        //---------------------Validar existencia pago-------------------------------

        public function validarExistencia($mesPago,$anioPago,$idCliente){

        }

        //--------------------Validar solvencia cliente------------------------------

        public function validarSolvencia($idCliente){

        }

        //--------------------Función para obtener todos los pagos

        public function obtenerPagos(){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoPagos = array();
        //Instrucción SQL
        $sql = "select p.id_pago, p.id_usuario, p.id_detalle_servicio, p.descripcion, p.mes, p.anio, p.total, p.estado, p.fecha, p.hora, u.id_usuario, u.nombre as nombreusuario, u.apellido as apellidousuario, s.id_servicio, s.nombre as nombreservicio, c.id_cliente, c.nombres as nombrescliente, c.apellidos as apellidoscliente, d.id_direccion, d.id_cliente,ds.id_detalle_servicio,ds.id_servicio, ds.id_direccion from pago p, usuario u, servicio s, direccion d, cliente c, detalle_servicio ds where p.id_detalle_servicio = ds.id_detalle_servicio and ds.id_direccion = d.id_direccion and ds.id_servicio = s.id_servicio and p.id_usuario = u.id_usuario and c.id_cliente = d.id_cliente";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $pagoIndex = new Pago();

            $pagoIndex->setIdPago($fila['id_pago']);
            $pagoIndex->setIdUsuario($fila['id_usuario']);
            $pagoIndex->setNombreUsuario($fila['nombreusuario'] . " " . $fila['apellidousuario']);
            $pagoIndex->setIdDetalleServicio($fila['id_detalle_servicio']);
            $pagoIndex->setNombreServicio($fila['nombreservicio']);
            $pagoIndex->setNombreCliente($fila['nombrescliente'] . " " . $fila['apellidoscliente']);
            $pagoIndex->setDescripcion($fila['descripcion']);
            $pagoIndex->setMes($fila['mes']);
            $pagoIndex->setAnio($fila['anio']);
            $pagoIndex->setTotal($fila['total']);
            $pagoIndex->setEstado($fila['estado']);
            $pagoIndex->setFecha($fila['fecha']);
            $pagoIndex->setHora($fila['hora']);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoPagos,$pagoIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoPagos;

        }

        //-------------------Función para buscar pago por id
        
        public function buscarPorId($idBusqueda){

            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoPago = new Pago();
         
         //Instrucción SQL
        $sql = "select p.id_pago, p.id_usuario, p.id_detalle_servicio, p.descripcion, p.mes, p.anio, p.total, p.estado, p.fecha, p.hora, u.id_usuario, u.nombre as nombreusuario, u.apellido as apellidousuario, s.id_servicio, s.nombre as nombreservicio, c.id_cliente, c.nombres as nombrescliente, c.apellidos as apellidoscliente, d.id_direccion, d.id_cliente,ds.id_detalle_servicio,ds.id_servicio, ds.id_direccion from pago p, usuario u, servicio s, direccion d, cliente c, detalle_servicio ds where p.id_detalle_servicio = ds.id_detalle_servicio and ds.id_direccion = d.id_direccion and ds.id_servicio = s.id_servicio and p.id_usuario = u.id_usuario and c.id_cliente = d.id_cliente and p.id_pago='" . $idBusqueda . "'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoPago->setIdPago($fila['id_pago']);
            $resultadoPago->setIdUsuario($fila['id_usuario']);
            $resultadoPago->setNombreUsuario($fila['nombreusuario'] . " " . $fila['apellidousuario']);
            $resultadoPago->setIdDetalleServicio($fila['id_detalle_servicio']);
            $resultadoPago->setNombreServicio($fila['nombreservicio']);
            $resultadoPago->setNombreCliente($fila['nombrescliente'] . " " . $fila['apellidoscliente']);
            $resultadoPago->setDescripcion($fila['descripcion']);
            $resultadoPago->setMes($fila['mes']);
            $resultadoPago->setAnio($fila['anio']);
            $resultadoPago->setTotal($fila['total']);
            $resultadoPago->setEstado($fila['estado']);
            $resultadoPago->setFecha($fila['fecha']);
            $resultadoPago->setHora($fila['hora']);
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoPago;

        }

        

    }


?>