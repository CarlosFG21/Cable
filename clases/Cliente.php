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

        public $servicios;

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
            return $this->nit;
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
        //Obtener la cantidad de servicios
        public function getServicios(){
            return $this->servicios;
        }
        //Setear la cantidad de clientes
        public function setServicios($_servicios){
            $this->servicios = $_servicios;
        }

        //----------------------Funci??n para guardar un cliente---------------------------------

        public function guardar($idUsuariog, $nombresg, $apellidosg, $dpig, $nitg, $generog, $telefonog, $fechaNacimientog,$fechag, $horag){

            //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucci??n SQL
        $sql = "insert into cliente(id_usuario,nombres,apellidos,dpi,nit,genero,telefono,fecha_nacimiento,fecha,hora) values(?,?,?,?,?,?,?,?,?,?)";
        //Preparamos la instrucci??n sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los par??metros
        //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
        $stmt->bind_param('isssssisss',$idUsuariog,$nombresg,$apellidosg,$dpig,$nitg,$generog,$telefonog,$fechaNacimientog,$fechag,$horag);
          
        //Ejecutamos instrucci??n
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

        }

        //----------------------Funci??n para editar un cliente-----------------------------------

        public function editar($nombrese, $apellidose, $dpie, $nite, $generoe, $telefonoe, $fechaNacimientoe,$fechae, $horae,$idClienteEditare){

            //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucci??n SQL
        $sql = "update cliente set nombres=?,apellidos=?,dpi=?,nit=?,genero=?,telefono=?,fecha_nacimiento=?,fecha=?,hora=? where id_cliente=?";
        //Preparamos la instrucci??n sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los par??metros
        //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
        $stmt->bind_param('sssssisssi',$nombrese,$apellidose,$dpie,$nite,$generoe,$telefonoe,$fechaNacimientoe,$fechae,$horae,$idClienteEditare);
          
        //Ejecutamos instrucci??n
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

        }

        //-----------------------Funci??n para desactivar un cliente------------------------------

        public function desactivar($idDesactivar){
            //Instanciamos la clase conexi??n
          $conexion = new Conexion();
          //Conectamos a la base de datos
          $conexion->conectar();
          //Estado a enviar
          $estado = 0;
          //Instrucci??n SQL
          $sql = "update 
          cliente inner join 
          direccion on 
          cliente.id_cliente = direccion.id_cliente 
          join detalle_servicio on direccion.id_direccion = detalle_servicio.id_direccion set cliente.estado=?, direccion.estado=?, detalle_servicio.estado=? where cliente.id_cliente=? and cliente.estado=1";
         // $sql = "update cliente set estado=? where id_cliente=?";
          //Preparamos la instrucci??n sql
          $stmt = $conexion->db->prepare($sql);
          
          //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
          $stmt->bind_param('iiii',$estado,$estado,$estado,$idDesactivar);
          
          //Ejecutamos instrucci??n
          $stmt->execute();
          
          //Desconectamos la base de datos
          $conexion->desconectar();
        }

        //-----------------------Funci??n para reactivar un cliente-------------------------------

        public function reactivar($idReactivar){
             //Instanciamos la clase conexi??n
          $conexion = new Conexion();
          //Conectamos a la base de datos
          $conexion->conectar();
          //Estado a enviar
          $estado = 1;
          //Instrucci??n SQL
          $sql = "update cliente set estado=? where id_cliente=?";
          //Preparamos la instrucci??n sql
          $stmt = $conexion->db->prepare($sql);
          
          //i = integer, s = string, d= double...se colocan segun el tama??o de parametros
          $stmt->bind_param('ii',$estado,$idReactivar);
          
          //Ejecutamos instrucci??n
          $stmt->execute();
          
          //Desconectamos la base de datos
          $conexion->desconectar();

        }

        //-----------------------Funci??n para buscar cliente por id------------------------------

        public function buscarPorId($idBusqueda){
            //Instanciamos la clase conexi??n
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoCliente = new Cliente();
         
         //Instrucci??n SQL
        $sql = "select *from cliente where id_cliente='" . $idBusqueda . "'";
        //Ejecuci??n de instrucci??n     
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

        //-----------------------Funci??n para consultar todos los clientes existentes-------------

        public function obtenerClientes(){

            //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoClientes = array();
        //Instrucci??n SQL
        $sql = "select *from cliente";
        //$sql = "SELECT c.id_cliente, c.id_usuario, c.nombres, c.apellidos, c.dpi, c.nit, c.genero, c.telefono, c.fecha_nacimiento, c.estado, c.fecha, c.hora, COUNT(ds.id_servicio) FROM cliente c INNER JOIN direccion d ON c.id_cliente=d.id_cliente INNER JOIN detalle_servicio ds ON d.id_direccion=ds.id_direccion GROUP BY c.id_cliente";
        //Ejecuci??n de instrucci??n     
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
            //$clienteIndex->setServicios($fila[12]);
           

            //Llenamos el array de resultados de usuarios
            array_push($resultadoClientes,$clienteIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoClientes;
        }

        //----------------------Funci??n para obtener clientes inactivos------------------------------------

        public function obtenerClientesInactivos(){

                //Instanciamos la clase conexi??n
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoClientes = array();
        //Instrucci??n SQL
        $sql = "select *from cliente where estado=0";
        //Ejecuci??n de instrucci??n     
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

        public function validarCliente($nombres,$apellidos,$dpi,$nit){
        
            //Instanciamos clase conexi??n
            $conexion = new Conexion();
            //Nos conectamos a la base de datos
            $conexion->conectar();
            //Variable validadora de existencia de personal
            $res=0;
    
            $sql = "select nombres,apellidos,dpi,nit from cliente where nombres='" . $nombres . "'" . " and apellidos='" . $apellidos . "'" . " and dpi='" . $dpi . "'" . " and nit='" . $nit . "'";
                    
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                if(strcmp($fila[0], $nombres) === 0 && strcmp($fila[1],$apellidos)===0 && strcmp($fila[2],$dpi)===0 && strcmp($fila[3],$nit)===0){
                    $res=1;//Ya existe
                    break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
                }
            }
    
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos resultado 1=existe, 0 = no existe
            return $res;
           }

           public function validarClienteEditar($nombres,$apellidos,$dpi,$nit,$genero,$telefono,$fecha){
        
            //Instanciamos clase conexi??n
            $conexion = new Conexion();
            //Nos conectamos a la base de datos
            $conexion->conectar();
            //Variable validadora de existencia de personal
            $res=0;
    
            $sql = "select nombres,apellidos,dpi,nit,genero,telefono,fecha_nacimiento from cliente where nombres='" . $nombres . "'" . " and apellidos='" . $apellidos . "'" . " and dpi='" . $dpi . "'" . " and nit='" . $nit . "'"." and genero='" . $genero . "'"." and telefono='" . $telefono . "'"." and fecha_nacimiento='" . $fecha . "'";
                    
            $ejecutar = mysqli_query($conexion->db, $sql);
    
            while($fila = mysqli_fetch_array($ejecutar)){
                if(strcmp($fila[0], $nombres) === 0 && strcmp($fila[1],$apellidos)===0 && strcmp($fila[2],$dpi)===0 && strcmp($fila[3],$nit)===0 && strcmp($fila[4],$genero)==0 && strcmp($fila[5],$telefono)==0 && strcmp($fila[6],$fecha)==0){
                    $res=1;//Ya existe
                    break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
                }
            }
    
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos resultado 1=existe, 0 = no existe
            return $res;
           }

    }

?>