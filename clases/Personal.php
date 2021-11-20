<?php
    require "db/Conexion.php";

    class Personal{
       
        public $idPersonal;
        public $nombres;
        public $apellidos;
        public $telefono;
        public $cargo;
        public $genero;
        public $fechaNacimiento;
        public $estado;
        public $fecha;
        public $hora;


        //Obtener id
        public function getIdPersonal(){
            return $this->idPersonal;
        }
        //Setear id
        public function setIdPersonal($_idPersonal){
            $this->idPersonal = $_idPersonal;
        }
        //obtener nombres
        public function getNombres(){
            return $this->nombres;
        }
        //Setear nombres
        public function setNombres($_nombres){
            $this->nombres = $_nombres;
        }
        //Obtener apellidos
        public function getApellidos(){
            return $this->apellidos;
        }
        //Setear apellidos
        public function setApellidos($_apellidos){
            $this->apellidos = $_apellidos;
        }
        //Obtener teléfono
        public function getTelefono(){
            return $this->telefono;
        }
        //Setear teléfono
        public function setTelefono($_telefono){
            $this->telefono = $_telefono;
        }
        //Obtener cargo
        public function getCargo(){
            return $this->cargo;
        }
        //Setear cargo
        public function setCargo($_cargo){
            $this->cargo = $_cargo;
        }
        //Obtener genero
        public function getGenero(){
            return $this->genero;
        }
        //Setear genero
        public function setGenero($_genero){
            $this->genero = $_genero;
        }
        //Obtener fecha de nacimiento
        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }
        //Setear fecha de nacimiento
        public function setFechaNacimiento($_fechaNacimiento){
            $this->fechaNacimiento = $_fechaNacimiento;
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

        //----------------------Función guardar personal-----------------------------------------

        public function guardar($nombresg, $apellidosg, $telefonog, $cargog, $generog, $fechaNacimientog, $fechag, $horag){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into personal(nombres,apellidos,telefono,cargo,genero,fecha_nacimiento,fecha,hora) values(?,?,?,?,?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('ssisssss',$nombresg,$apellidosg,$telefonog,$cargog,$generog,$fechaNacimientog,$fechag,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //----------------------Función editar personal------------------------------------------

        public function editar($nombrese, $apellidose, $telefonoe, $cargoe, $generoe, $fechaNacimientoe,$idEditare){

             //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update personal set nombres=?,apellidos=?,telefono=?,cargo=?,genero=?,fecha_nacimiento=? where id_personal=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('ssisssi',$nombrese,$apellidose,$telefonoe,$cargoe,$generoe,$fechaNacimientoe,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //---------------------Función desactivar personal---------------------------------------

        public function desactivar($idDesactivar){
              //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 0;
         //Instrucción SQL
         $sql = "update personal set estado=? where id_personal=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idDesactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //--------------------Función para reactivar personal------------------------------------

        public function reactivar($idReactivar){
         //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucción SQL
         $sql = "update personal set estado=? where id_personal=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();
        }

        //--------------------Función para buscar personal por id--------------------------------

        public function buscarPorId($idBusqueda){
            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoPersonal = new Personal();
         
         //Instrucción SQL
        $sql = "select *from personal where id_personal='" . $idBusqueda . "'" ." and estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoPersonal->setIdPersonal($fila[0]);
            $resultadoPersonal->setNombres($fila[1]);
            $resultadoPersonal->setApellidos($fila[2]);
            $resultadoPersonal->setTelefono($fila[3]);
            $resultadoPersonal->setCargo($fila[4]);
            $resultadoPersonal->setGenero($fila[5]);
            $resultadoPersonal->setFechaNacimiento($fila[6]);
            $resultadoPersonal->setEstado($fila[7]);
            $resultadoPersonal->setFecha($fila[8]);
            $resultadoPersonal->setHora($fila[9]);
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoPersonal;
        }

        //--------------------Función para mostrar todos los registros de personal---------------

        public function obtenerPersonal(){
        
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoPersonal = array();
        //Instrucción SQL
        $sql = "select *from personal where estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $personalIndex = new Personal();

            $personalIndex->setIdPersonal($fila[0]);
            $personalIndex->setNombres($fila[1]);
            $personalIndex->setApellidos($fila[2]);
            $personalIndex->setTelefono($fila[3]);
            $personalIndex->setCargo($fila[4]);
            $personalIndex->setGenero($fila[5]);
            $personalIndex->setFechaNacimiento($fila[6]);
            $personalIndex->setEstado($fila[7]);
            $personalIndex->setFecha($fila[8]);
            $personalIndex->setHora($fila[9]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoPersonal,$personalIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoPersonal;

        }

        //------------------Obtener todo el personal inactivo------------------------------------

        public function obtenerPersonalInactivo(){
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoPersonal = array();
        //Instrucción SQL
        $sql = "select *from personal where estado=0";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $personalIndex = new Personal();

            $personalIndex->setIdPersonal($fila[0]);
            $personalIndex->setNombres($fila[1]);
            $personalIndex->setApellidos($fila[2]);
            $personalIndex->setTelefono($fila[3]);
            $personalIndex->setCargo($fila[4]);
            $personalIndex->setGenero($fila[5]);
            $personalIndex->setFechaNacimiento($fila[6]);
            $personalIndex->setEstado($fila[7]);
            $personalIndex->setFecha($fila[8]);
            $personalIndex->setHora($fila[9]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoPersonal,$personalIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoPersonal;
        }

    }

?>