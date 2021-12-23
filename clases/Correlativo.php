<?php

    class Correlativo{
        public $id;
        public $fecha;
        public $hora;

        //Obtener id
        public function getId(){
            return $this->id;
        }
        //Setear id
        public function setId($_id){
            $this->id = $_id;
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

       

        //----------------------Guardar un correlativo--------------------------------------

        public function guardar($fechag,$horag){
            //Instanciamos la clase conexión
        $conexion = new Conexion();
        //Conectamos a la base de datos
        $conexion->conectar();
        //Instrucción SQL
        $sql = "insert into correlativo(fecha_commit,hora_commit)values(?,?)";
        //Preparamos la instrucción sql
        $stmt = $conexion->db->prepare($sql);
        
        //Enviamos los parámetros
        //i = integer, s = string, d= double...se colocan segun el tamaño de parametros
        $stmt->bind_param('ss',$fechag,$horag);
          
        //Ejecutamos instrucción
        $stmt->execute();
        
        //Desconectamos la base de datos
        $conexion->desconectar();
        }

        //---------------Obtener correlativo-------------------

        //-------------------Función para buscar pago por id
        
        public function obtenerCorrelativo(){

            //Instanciamos la clase conexión
         $conexion = new Conexion();
         //Conectamos a la base de datos
         $conexion->conectar();
         //Declaramos el objeto contenedor del resultado
         $resultadoCorrelativo = new Correlativo();
         
         //Instrucción SQL
        $sql = "select *from correlativo";
        //Ejecución de instrucción     
        $ejecutar = mysqli_query($conexion->db, $sql);

        $res = 0;

        while($fila = mysqli_fetch_array($ejecutar)){
            
            $res = $fila['id'];
            
        
        }
            //Nos desconectamos de la base de datos
            $conexion->desconectar();
            //Devolvemos el usuario encontrado
            return $res;

        }



    }


?>