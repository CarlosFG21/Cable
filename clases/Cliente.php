<?php

//include("../db/Conexion.php");

    class Cliente{

        public $idCliente;
        public $idUsuario;
        public $nombres;
        public $apellidos;
        public $dpi;
        public $nit;
        public $genero;
        public $telefono;
        public $fechaNacimiento;
        public $estado;
        public $fecha;
        public $hora;

        //obtener id del cliente
        public function getIdCliente(){
            return $this->idCliente;
        }
        //setear id del cliente
        public function setIdCliente($_idCliente){
            $this->idCliente = $_idCliente;
        }
        //obtener id de id de usuario
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        //setear id de id de usuario
        public function setIdUsuario($_idUsuario){
            $this->idUsuario=$_idUsuario;
        }
        //obtener nombres
        public function getNombres(){
            return $this->nombres;
        }
        //setear nombres
        public function setNombres($_nombres){
            $this->nombres = $_nombres;
        }
        //obtener apellidos
        public function getApellidos(){
            return $this->apellidos;
        }
        //setear apellidos
        public function setApellidos($_apellidos){
            $this->apellidos = $_apellidos;
        }
        //obtener dpi
        public function getDpi(){
            return $this->dpi;
        }
        //setear dpi
        public function setDpi($_dpi){
            $this->dpi = $_dpi;
        }
        //obtener nit
        public function getNit(){
            return $this->dpi;
        }
        //setear nit
        public function setNit($_nit){
            $this->nit = $_nit;
        }
        //obtener genero
        public function getGenero(){
            return $this->genero;
        }
        //setear genero
        public function setGenero($_genero){
            $this->genero = $_genero;
        }
        //obtener telefono
        public function getTelefono(){
            return $this->telefono;
        }
        //setear telefono
        public function setTelefono($_telefono){
            $this->telefono = $_telefono;
        }
        //obtener fecha de nacimiento
        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }
        //setear fecha de nacimiento
        public function setFechaNacimiento($_fechaNacimiento){
            $this->fechaNacimiento = $_fechaNacimiento;
        }
        //obtener estado
        public function getEstado(){
            return $this->estado;
        }
        //setear estado
        public function setEstado($_estado){
            $this->estado = $_estado;
        }
        //obtener fecha
        public function getFecha(){
            return $this->fecha;
        }
        //setear fecha
        public function setFecha($_fecha){
            $this->fecha = $_fecha;
        }
        //obtener hora
        public function getHora(){
            return $this->hora;
        }
        //setear hora
        public function setHora($_hora){
            $this->hora = $_hora;
        }

        //----------------------Función para guardar un cliente---------------------------------

        public function guardar($idUsuariog, $nombresg, $apellidosg, $dpig, $nitg, $generog, $telefonog, $fechaNacimientog,$fechag, $horag){

            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into cliente(id_usuario,nombres,apellidos,dpi,nit,genero,telefono,fecha_nacimiento,fecha,hora) values(?,?,?,?,?,?,?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('isssssisss',$idUsuariog,$nombresg,$apellidosg,$dpig,$nitg,$generog,$telefonog,$fechaNacimientog,$fechag,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

        }

        //----------------------Función para editar un cliente-----------------------------------

        public function editar($nombrese, $apellidose, $dpie, $nite, $generoe, $telefonoe, $fechaNacimientoe,$fechae, $horae,$idClienteEditare){

            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update cliente set nombres=?,apellidos=?,dpi=?,nit=?,genero=?,telefono=?,fecha_nacimiento=?,fecha=?,hora=? where id_cliente=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('sssssisssi',$nombrese,$apellidose,$dpie,$nite,$generoe,$telefonoe,$fechaNacimientoe,$fechae,$horae,$idClienteEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

        }

        //-----------------------Función para desactivar un cliente------------------------------

        public function desactivar($idDesactivar){
            //Instanciamos la clase conexión
          $conexion = new Conexion();
          //Conectamos a la base de datos
          $conexion->conectar();
          //Estado a enviar
          $estado = 0;
          //Instrucción SQL
          $sql = "update cliente set estado=? where id_cliente=?";
          //Preparamos la instrucción sql
          $stmt = $conexion->db->prepare($sql);
          
          //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
          $stmt->bind_param('ii',$estado,$idDesactivar);
          
          //Ejecutamos instrucción
          $stmt->execute();
          
          //Desconectamos la base de datos
          $conexion->desconectar();
        }

        //-----------------------Función para reactivar un cliente-------------------------------

        public function reactivar($idReactivar){
             //Instanciamos la clase conexión
          $conexion = new Conexion();
          //Conectamos a la base de datos
          $conexion->conectar();
          //Estado a enviar
          $estado = 1;
          //Instrucción SQL
          $sql = "update cliente set estado=? where id_cliente=?";
          //Preparamos la instrucción sql
          $stmt = $conexion->db->prepare($sql);
          
          //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
          $stmt->bind_param('ii',$estado,$idReactivar);
          
          //Ejecutamos instrucción
          $stmt->execute();
          
          //Desconectamos la base de datos
          $conexion->desconectar();

        }

        //-----------------------Función para buscar cliente por id------------------------------

        public function buscarPorId($idBusqueda){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoCliente = new Cliente();
         
         //Instrucción SQL
        $sql = "select *from cliente where id_cliente='" . $idBusqueda . "'" ." and estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoCliente->setIdCliente($fila[0]);
            $resultadoCliente->setIdUsuario($fila[1]);
            $resultadoCliente->setNombres($fila[2]);
            $resultadoCliente->setApellidos($fila[3]);
            $resultadoCliente->setDpi($fila[4]);
            $resultadoCliente->setNit($fila[5]);
            $resultadoCliente->setGenero($fila[6]);
            $resultadoCliente->setTelefono($fila[7]);
            $resultadoCliente->setFechaNacimiento($fila[8]);
            $resultadoCliente->setEstado($fila[9]);
            $resultadoCliente->setFecha($fila[10]);
            $resultadoCliente->setHora($fila[11]);
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoCliente;
        }

        //-----------------------Función para consultar todos los clientes existentes-------------

        public function obtenerClientes(){

            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoClientes = array();
        //Instrucción SQL
        $sql = "select *from cliente where estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $clienteIndex = new Cliente();

            $clienteIndex->setIdCliente($fila[0]);
            $clienteIndex->setIdUsuario($fila[1]);
            $clienteIndex->setNombres($fila[2]);
            $clienteIndex->setApellidos($fila[3]);
            $clienteIndex->setDpi($fila[4]);
            $clienteIndex->setNit($fila[5]);
            $clienteIndex->setGenero($fila[6]);
            $clienteIndex->setTelefono($fila[7]);
            $clienteIndex->setFechaNacimiento($fila[8]);
            $clienteIndex->setEstado($fila[9]);
            $clienteIndex->setFecha($fila[10]);
            $clienteIndex->setHora($fila[11]);
           

            //Llenamos el array de resultados de usuarios
            array_push($resultadoClientes,$clienteIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoClientes;
        }

        //----------------------Función para obtener clientes inactivos------------------------------------

        public function obtenerClientesInactivos(){

                //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoClientes = array();
        //Instrucción SQL
        $sql = "select *from cliente where estado=0";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $clienteIndex = new Cliente();

            $clienteIndex->setIdCliente($fila[0]);
            $clienteIndex->setIdUsuario($fila[1]);
            $clienteIndex->setNombres($fila[2]);
            $clienteIndex->setApellidos($fila[3]);
            $clienteIndex->setDpi($fila[4]);
            $clienteIndex->setNit($fila[5]);
            $clienteIndex->setGenero($fila[6]);
            $clienteIndex->setTelefono($fila[7]);
            $clienteIndex->setFechaNacimiento($fila[8]);
            $clienteIndex->setEstado($fila[9]);
            $clienteIndex->setFecha($fila[10]);
            $clienteIndex->setHora($fila[11]);
           

            //Llenamos el array de resultados de usuarios
            array_push($resultadoClientes,$clienteIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoClientes;
        }


    }

?>