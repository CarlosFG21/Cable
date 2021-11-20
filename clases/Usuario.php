<?php

    require "db/Conexion.php";

     class Usuario{
        
        public $idUsuario;
        public $nombre;
        public $apellido;
        public $rol;
        public $nickname;
        public $contrasena;
        public $estado;
        public $fecha;
        public $hora;

       //obtener id
       public function getIdUsuario(){
           return $this->idUsuario;
       }
       //setear id
       public function setIdUsuario($_id){
           $this->idUsuario = $_id;
       }
       //obtener nombre
       public function getNombre(){
           return $this->nombre;
       }
       //setear nombre
       public function setNombre($_nombre){
           $this->nombre = $_nombre;
       }
       //obtener apellido
       public function getApellido(){
           return $this->apellido;
       }
       //setear apellido
       public function setApellido($_apellido){
           $this->apellido = $_apellido;
       }
       //obtener rol
       public function getRol(){
           return $this->rol;
       }
       //setear rol
       public function setRol($_rol){
           $this->rol = $_rol;
       }
       //obtener nickname
       public function getNickname(){
           return $this->nickname;
       }
       //setear nickname
       public function setNickname($_nickname){
           $this->nickname = $_nickname;
       }
       //obtener contraseña
       public function getContrasena(){
           return $this->contrasena;
       }
       //setear contraseña
       public function setContrasena($_contrasena){
           $this->contrasena = $_contrasena;
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

       //-------------------------------Función para guardar un usuario----------------------------------------

       public function guardar($nombreg, $apellidog, $rolg, $nicknameg, $contrasenag, $fechag, $horag){
        
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into usuario(nombre,apellido,rol,nickname,contrasena,fecha,hora) values(?,?,?,?,?,?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('sssssss',$nombreg,$apellidog,$rolg,$nicknameg,$contrasenag,$fechag,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();

       }

       //---------------------------------Función para editar un usuario------------------------------------------

       public function editar($nombree, $apellidoe, $role, $nicknamee, $contrasenae,$idEditare){
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "update usuario set nombre=?, apellido=?, rol=?, nickname=?, contrasena=? where id_usuario=?";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('sssssi',$nombree,$apellidoe,$role,$nicknamee,$contrasenae,$idEditare);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
       }

       //--------------------------------Función para desactivar un usuario-----------------------------------

       public function desactivar($idDesactivar){

          //Instanciamos la clase conexión
          $conexion = new Conexion();
          //Conectamos a la base de datos
          $conexion->conectar();
          //Estado a enviar
          $estado = 0;
          //Instrucción SQL
          $sql = "update usuario set estado=? where id_usuario=?";
          //Preparamos la instrucción sql
          $stmt = $conexion->db->prepare($sql);
          
          //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
          $stmt->bind_param('ii',$estado,$idDesactivar);
          
          //Ejecutamos instrucción
          $stmt->execute();
          
          //Desconectamos la base de datos
          $conexion->desconectar();

       }

       //--------------------------------Función para reactivar un usuario------------------------------------

       public function reactivar($idReactivar){
            
         //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Estado a enviar
         $estado = 1;
         //Instrucción SQL
         $sql = "update usuario set estado=? where id_usuario=?";
         //Preparamos la instrucción sql
         $stmt = $conexion->db->prepare($sql);
         
         //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
		 $stmt->bind_param('ii',$estado,$idReactivar);
		 
         //Ejecutamos instrucción
         $stmt->execute();
         
         //Desconectamos la base de datos
         $conexion->desconectar();

       }

       //--------------------------Función para consultar por id de usuario------------------------------------

       public function buscarPorId($idBusqueda){
         
        //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoUsuario = new Usuario();
         
         //Instrucción SQL
        $sql = "select *from usuario where id_usuario='" . $idBusqueda . "'" ." and estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $resultadoUsuario->setIdUsuario($fila[0]);
            $resultadoUsuario->setNombre($fila[1]);
            $resultadoUsuario->setApellido($fila[2]);
            $resultadoUsuario->setRol($fila[3]);
            $resultadoUsuario->setNickname($fila[4]);
            $resultadoUsuario->setContrasena($fila[5]);
            $resultadoUsuario->setEstado($fila[6]);
            $resultadoUsuario->setFecha($fila[7]);
            $resultadoUsuario->setHora($fila[8]);
           
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $resultadoUsuario;
       }

       //----------------------Función para consultar todos los usuarios existentes--------------------------

       public function obtenerUsuarios(){
        
        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoUsuarios = array();
        //Instrucción SQL
        $sql = "select *from usuario where estado=1";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $usuarioIndex = new Usuario();

            $usuarioIndex->setIdUsuario($fila[0]);
            $usuarioIndex->setNombre($fila[1]);
            $usuarioIndex->setApellido($fila[2]);
            $usuarioIndex->setRol($fila[3]);
            $usuarioIndex->setNickname($fila[4]);
            $usuarioIndex->setContrasena($fila[5]);
            $usuarioIndex->setEstado($fila[6]);
            $usuarioIndex->setFecha($fila[7]);
            $usuarioIndex->setHora($fila[8]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoUsuarios,$usuarioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoUsuarios;
       
       }

       //--------------------------Función para obtener usuarios inactivos---------------------------------

       public function obtenerUsuariosInactivos(){

            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoUsuarios = array();
        //Instrucción SQL
        $sql = "select *from usuario where estado=0";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $usuarioIndex = new Usuario();

            $usuarioIndex->setIdUsuario($fila[0]);
            $usuarioIndex->setNombre($fila[1]);
            $usuarioIndex->setApellido($fila[2]);
            $usuarioIndex->setRol($fila[3]);
            $usuarioIndex->setNickname($fila[4]);
            $usuarioIndex->setContrasena($fila[5]);
            $usuarioIndex->setEstado($fila[6]);
            $usuarioIndex->setFecha($fila[7]);
            $usuarioIndex->setHora($fila[8]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoUsuarios,$usuarioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoUsuarios;

       }

       //--------------------------Función para consultar usuarios por rol administrador--------------------

       public function obtenerUsuariosAdministradores(){

        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoUsuarios = array();
        //Instrucción SQL
        $sql = "select *from usuario where estado=1 and rol='ADMINISTRADOR'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $usuarioIndex = new Usuario();

            $usuarioIndex->setIdUsuario($fila[0]);
            $usuarioIndex->setNombre($fila[1]);
            $usuarioIndex->setApellido($fila[2]);
            $usuarioIndex->setRol($fila[3]);
            $usuarioIndex->setNickname($fila[4]);
            $usuarioIndex->setContrasena($fila[5]);
            $usuarioIndex->setEstado($fila[6]);
            $usuarioIndex->setFecha($fila[7]);
            $usuarioIndex->setHora($fila[8]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoUsuarios,$usuarioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoUsuarios;
       
        
       }

       //----------------Función para consultar usuarios por usuario con rol normal--------------------------

       public function obtenerUsuariosNormales(){

        //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Array contenedor de resultados
        $resultadoUsuarios = array();
        //Instrucción SQL
        $sql = "select *from usuario where estado=1 and rol='TÉCNICO'";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            
            //Instanciamos objeto
            $usuarioIndex = new Usuario();

            $usuarioIndex->setIdUsuario($fila[0]);
            $usuarioIndex->setNombre($fila[1]);
            $usuarioIndex->setApellido($fila[2]);
            $usuarioIndex->setRol($fila[3]);
            $usuarioIndex->setNickname($fila[4]);
            $usuarioIndex->setContrasena($fila[5]);
            $usuarioIndex->setEstado($fila[6]);
            $usuarioIndex->setFecha($fila[7]);
            $usuarioIndex->setHora($fila[8]);

            //Llenamos el array de resultados de usuarios
            array_push($resultadoUsuarios,$usuarioIndex);
           
        }

        //Nos desconectamos de la base de datos
        $conexion->desconectar();

        //Devolvemos los usuarios encontrados
        return $resultadoUsuarios;

       }

       //-----------------------Función para validar usuario y contraseña (Inicio de sesión)-----------------

       //Devuelve 0 si el usuario no existe y 1 cuando si existe y crea automaticamente la variable de sesión del usuario "usuario"
       
       public function validarUsuario($nick_user, $password_user){
           //Instanciamos la clase conexión
           $conexion = new Conexion();
           //Nos conectamos a la base de datos
           $conexion->conectar();
           //Variable validadora de credenciales correctos
           $validador=0;
           //Instanciamos la clase usuario
           $usuario = new Usuario();
           //Sentencia sql
           $sql = "select *from usuario where nickname='" . $nick_user . "'" . " and contrasena='" . $password_user . "'";

           $ejecutar = mysqli_query($conexion->db, $sql);
            //Recorremos los resultados de la consulta
            while($fila = mysqli_fetch_array($ejecutar)){
             //Validamos si el usuario y contraseña existe
             if(strcmp($fila[4], $nick_user) === 0 && strcmp($fila[5],$password_user)===0){
        
                $validador=1;//Si existe el usuario

                //Llenamos los datos del usuario

                $usuario->setIdUsuario($fila[0]);
                $usuario->setNombre($fila[1]);
                $usuario->setApellido($fila[2]);
                $usuario->setRol($fila[3]);
                $usuario->setNickname($fila[4]);
                $usuario->setContrasena($fila[5]);
                $usuario->setEstado($fila[6]);
                $usuario->setFecha($fila[7]);
                $usuario->setHora($fila[8]);

                break;//Rompemos ciclo debido a que no sirve de nada seguir buscando debido a que ya hay primera coincidencia
             }
        }

        //---Guardamos en variable de sesión el usuario
        
        //Guardamos el objeto usuario en sesión
        if($validador==1){
            //---Inicializamos la sesión
             session_start();
            $_SESSION['usuario']=$usuario;
        
        }
        //Desconectamos la base de datos
        $conexion->desconectar();
        //Devolvemos resultados
        return $validador;
       }

       //-----------------------Función para validar existencia de nickname----------------------------------

       //Devuelve 0 si el nickname no existe y 1 cuando ya existe
       
       public function validarNickname($nick){
        
        //Instanciamos clase conexión
        $conexion = new Conexion();
        //Nos conectamos a la base de datos
        $conexion->conectar();
        //Variable validadora de existencia de nickname
        $res=0;

        $sql = "select nickname from usuario where nickname='" . $nick . "'";
                
        $ejecutar = mysqli_query($conexion->db, $sql);

        while($fila = mysqli_fetch_array($ejecutar)){
            if(strcmp($fila[0], $nick) === 0){
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